<?php

namespace App\Http\Traits;

trait ResponseTrait
{
    /**
     * Success Response
     */
    public function success(string $message = 'Success', $data = null, int $status = 200)
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data'    => $data,
        ], $status);
    }

    /**
     * Error Response
     */
    public function error(string $message = 'Something went wrong', int $status = 500, $errors = null)
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'errors'  => $errors,
        ], $status);
    }
}