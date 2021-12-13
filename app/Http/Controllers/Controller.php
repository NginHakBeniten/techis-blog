<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use Illuminate\Http\Response;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    private $page_limit = 15;

    /**
     * getPagination
     *
     * @return void
     */
    protected function getPagination()
    {
        return $this->page_limit;
    }

    /**
     * setPagination
     *
     * @param  mixed $page_limit
     * @return void
     */
    protected function setPagination($page_limit)
    {
        $this->page_limit = $page_limit;
    }
    
    /**
     * successMessage
     *
     * @param  mixed $message
     * @param  mixed $status_code = Response::HTTP_OK
     * @return void
     */
    protected function successMessage($message, $status_code = Response::HTTP_OK)
    {
        return ResponseHelper::successMessage($message, $status_code);
    }

    /**
     * successResponse
     *
     * @param  mixed $data
     * @param  mixed $status_code = Response::HTTP_OK
     * @return void
     */
    protected function successResponse($data, $status_code = Response::HTTP_OK)
    {
        return ResponseHelper::successResponse($data, $status_code);
    }

    /**
     * successPaginateResponse
     *
     * @param  mixed $data
     * @param  mixed $status_code = Response::HTTP_OK
     * @return void
     */
    protected function successPaginateResponse($data, $meta = null)
    {
        return ResponseHelper::successPaginateResponse(is_array($data) ? $data : $data->toArray(), $meta);
    }

    /**
     * errorResponse
     *
     * @param  mixed $data
     * @param  mixed $status_code = Response::HTTP_UNPROCESSABLE_ENTITY
     * @return void
     */
    protected function errorResponse($data, $status_code = Response::HTTP_UNPROCESSABLE_ENTITY)
    {
        return ResponseHelper::errorResponse($data, $status_code);
    }

    /**
     * errorMessage
     *
     * @param  mixed $message
     * @param  mixed $status_code = Response::HTTP_UNPROCESSABLE_ENTITY
     * @return void
     */
    protected function errorMessage($message, $status_code = Response::HTTP_UNPROCESSABLE_ENTITY)
    {
        return ResponseHelper::errorMessage($message, $status_code);
    }

}
