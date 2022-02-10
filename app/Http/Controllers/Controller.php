<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\Helpers\ResponseHelper;
use Illuminate\Http\Response;

class Controller extends BaseController
{
    private $pageLimit = 15;

    /**
     * getPagination
     *
     * @return void
     */
    protected function getPagination()
    {
        return $this->pageLimit;
    }

    /**
     * setPagination
     *
     * @param  mixed $pageLimit
     * @return void
     */
    protected function setPagination($pageLimit)
    {
        $this->pageLimit = $pageLimit;
    }

    /**
     * successMessage
     *
     * @param  mixed $message
     * @param  mixed $statusCode = Response::HTTP_OK
     * @return void
     */
    protected function successMessage($message, $statusCode = Response::HTTP_OK)
    {
        return ResponseHelper::successMessage($message, $statusCode);
    }

    /**
     * successResponse
     *
     * @param  mixed $data
     * @param  mixed $statusCode = Response::HTTP_OK
     * @return void
     */
    protected function successResponse($data, $statusCode = Response::HTTP_OK)
    {
        return ResponseHelper::successResponse($data, $statusCode);
    }

    /**
     * success_paginate_response
     *
     * @param  mixed $data
     * @param  mixed $statusCode = Response::HTTP_OK
     * @return void
     */
    protected function successPaginateResponse($data)
    {
        return ResponseHelper::successPaginateResponse($data->getCollection(), [
            'total' => $data->total(),
            'per_page' => $data->perPage(),
            'total_page' => $data->lastPage(),
            'current_page' => $data->currentPage(),
            'next_page' => $data->nextPageUrl(),
            'prev_page' => $data->previousPageUrl()
        ]);
    }

    /**
     * errorResponse
     *
     * @param  mixed $data
     * @param  mixed $statusCode = Response::HTTP_UNPROCESSABLE_ENTITY
     * @return void
     */
    protected function errorResponse($data, $statusCode = Response::HTTP_UNPROCESSABLE_ENTITY)
    {
        return ResponseHelper::errorResponse($data, $statusCode);
    }

    /**
     * errorMessage
     *
     * @param  mixed $message
     * @param  mixed $statusCode = Response::HTTP_UNPROCESSABLE_ENTITY
     * @return void
     */
    protected function errorMessage($message, $statusCode = Response::HTTP_UNPROCESSABLE_ENTITY)
    {
        return ResponseHelper::errorMessage($message, $statusCode);
    }
}
