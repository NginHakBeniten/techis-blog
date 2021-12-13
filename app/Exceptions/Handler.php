<?php

namespace App\Exceptions;

use App\Helpers\ResponseHelper;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Laravel\Lumen\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof ValidationException) {
            $error = $exception->validator->errors()->first();
            \Log::debug($error);
            return ResponseHelper::errorMessage($error);
        }

        if ($exception instanceof UnauthorizedException) {
            $message = $exception->getMessage();
            return ResponseHelper::errorMessage($message, Response::HTTP_UNAUTHORIZED);
        }

        if ($exception instanceof ModelNotFoundException) {
            $model = $exception->getModel();
            $message = $exception->getMessage();
            $error_msg = !$model ? $message : Str::replaceFirst("App\\Models\\", '', $exception->getModel()) . ' not found.';
            return ResponseHelper::errorMessage($error_msg, Response::HTTP_NOT_FOUND);
        }

        if ($exception instanceof Exception) {
            $message = $exception->getMessage();
            return ResponseHelper::errorMessage($message);
        }

        if ($exception instanceof MethodNotAllowedHttpException) {
            $message = $exception->getMessage();
            return ResponseHelper::errorMessage($message);
        }

        return parent::render($request, $exception);
    }
}
