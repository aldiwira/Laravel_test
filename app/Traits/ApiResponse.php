<?php

namespace App\Traits;

trait ApiResponse
{
    protected function apiSuccess($data, $message = null, $code = 200)
    {
        return response()->json([
            'status' => true,
            'messsage' => $message,
            'data' => $data
        ], $code);
    }
    protected function apiError($data, $code = 400, $message = null)
    {
        return response()->json([
            'status' => false,
            'messsage' => $message,
            'data' => $data
        ], $code);
    }
}
