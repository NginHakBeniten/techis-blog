<?php

namespace App\Helpers;

use Illuminate\Http\Response;

class ResponseHelper
{

    /**
     * successResponse
     *
     * @param  mixed $data
     * @return void
     */
    public static function successResponse($data)
    {
        return response()->json(['data' => $data, 'status_code' => Response::HTTP_OK]);
    }

    /**
     * successResponse
     *
     * @param  mixed $data
     * @return void
     */
    public static function successPaginateResponse($data, $meta = null)
    {
        return response()->json(['data' => $data['data'] ?? $data, 'meta' => $meta, 'status_code' => Response::HTTP_OK]);
    }

    /**
     * errorResponse
     *
     * @param  mixed $message
     * @param  mixed $code
     * @return void
     */
    public static function errorResponse($message, $code = Response::HTTP_UNPROCESSABLE_ENTITY)
    {
        return response()->json(['data' => ['message' => $message], 'status_code' => $code]);
    }

    /**
     * successMessage
     *
     * @param  mixed $message
     * @return void
     */
    public static function successMessage($message, $code = Response::HTTP_OK)
    {
        return response()->json(['data' => ['message' => $message], 'status_code' => $code]);
    }

    /**
     * errorMessage
     *
     * @param  mixed $message
     * @return void
     */
    public static function errorMessage($message, $code = Response::HTTP_UNPROCESSABLE_ENTITY)
    {
        return response()->json(['data' => ['message' => $message], 'status_code' => $code]);
    }
}
