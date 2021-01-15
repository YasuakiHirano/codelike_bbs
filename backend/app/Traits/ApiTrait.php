<?php
namespace App\Traits;

trait ApiTrait {
    function apiResponse($message, array $errors, int $httpStatus) {
        return response()->json([
            'message' => $message,
            'errors' => $errors
        ], $httpStatus);
    }
}