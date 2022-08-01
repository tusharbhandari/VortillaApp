<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function createErrorResponse($message,$data=null,$httpCode=400)
    {
        $response = [
            "status" => false,
            "httpCode" => $httpCode,
            "message" => $message,
            "data" => $data
        ];

        return response()->json($response);

    }

    public function createValidationResponse($validator, $data = null, $httpCode = 400)
    {
        $messagesArr = $validator->errors()->all();
        $message = implode("\r\n", $messagesArr);
        $response = [
            "status" => false,
            "httpCode" => $httpCode,
            "message" => $message,
            "data" => $data,
        ];
        // return response()->json($response, $httpCode);
        return response()->json($response);
    }

    public function createSuccessResponse($message, $data = null, $httpCode = 200)
    {
        $response = [
            "status" => true,
            "httpcode" => $httpCode,
            "message" => $message,
            "data" => $data,
            ];
        return response()->json($response);
    }
}
