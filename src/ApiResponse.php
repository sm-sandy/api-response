<?php

namespace Sandy\ApiResponse;

class ApiResponse
{
    public function custom($data = [], $message = null, $statusCode)
    {
        return $this->formatResponseSucess($data, $message, $statusCode);
    }

    /*
      For Success Responses (2xx):
    */
    public function success($data = [], $message = null)
    {
        $messageS = empty($message) ? config('api-response.sucessMessage') : $message;
        return $this->formatResponseSucess($data, $messageS, 200);
    }
    public function created($data = [], $message = null)
    {
        $messageS = empty($message) ? config('api-response.createdMessage') : $message;
        return $this->formatResponseSucess($data, $messageS, 201);
    }
    public function noContent($message = null)
    {
        $messageS = empty($message) ? config('api-response.noContentMessage') : $message;
        return $this->formatResponseSucess([], $messageS, 204);
    }
    /*
      Client Error Responses (4xx):
    */
    public function badRequest($message = null)
    {
        $messageE = empty($message) ? config('api-response.badRequestMessage') : $message;
        return $this->formatResponseError($messageE, 400);
    }
    public function unauthorized($message = null)
    {
        $messageE = empty($message) ? config('api-response.unauthorizedMessage') : $message;
        return $this->formatResponseError($messageE, 401);
    }
    public function forbidden($message = null)
    {
        $messageE = empty($message) ? config('api-response.forbiddenMessage') : $message;
        return $this->formatResponseError($messageE, 403);
    }
    public function notFound($message = null)
    {
        $messageE = empty($message) ? config('api-response.notFoundMessage') : $message;
        return $this->formatResponseError($messageE, 404);
    }


    /*
      Server Error Responses (5xx):
    */
    public function error($message = null)
    {
        $messageE = empty($message) ? config('api-response.errorMessage') : $message;
        return $this->formatResponseError($messageE, 500);
    }

    private function formatResponseSucess($data, $message, $statusCode)
    {
        $response = [
            'data' => $data,
            'message' => $message,
            'status_code' => $statusCode,
        ];

        return response()->json($response, $statusCode);
    }
    private function formatResponseError($message, $statusCode)
    {
        $response = [
            'message' => $message,
            'status_code' => $statusCode,
        ];

        return response()->json($response, $statusCode);
    }
}
