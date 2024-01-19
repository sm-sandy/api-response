<?php

namespace Sandy\ApiResponse;

class ApiResponse
{
    public function success($data = [], $message = null, $statusCode = 200)
    {
        $messageS = empty($message) ? config('api-response.sucessMessage') : $message;
        return $this->formatResponse($data, $messageS, $statusCode);
    }

    public function error($message = null, $statusCode = 500)
    {
        $messageE = empty($message) ? config('api-response.errorMessage') : $message;
        return $this->formatResponse([], $messageE, $statusCode);
    }

    private function formatResponse($data, $message, $statusCode)
    {
        $response = [
            'data' => $data,
            'message' => $message,
            'status_code' => $statusCode,
        ];

        return response()->json($response, $statusCode);
    }
}
