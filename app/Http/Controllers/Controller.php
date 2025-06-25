<?php

namespace App\Http\Controllers;

abstract class Controller
{
    protected function apiResponse($data, $status = 200, $message = '', $errorMessage = null, $errorFile = null, $errorLine = null)
{
    $response = [
        'message' => $message,
        'data' => $data,
    ];

    if ($status >= 400) {
        $response['error'] = [
            'message' => $errorMessage,
            'file' => $errorFile,
            'line' => $errorLine,
        ];
    }

    return response()->json($response, $status);
}

}
