<?php

namespace App\Http\Controllers;

use App\ResouceModels\BaseResourceModels\ResponseResourceModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    protected function success(mixed $data = null, string $message = null): JsonResponse
    {
        $responseResource = new ResponseResourceModel();
        $responseResource->status = true;
        $responseResource->result = $data;
        $responseResource->message = $message ?? $responseResource->message;

        $response = new JsonResponse();

        return $response->setData($responseResource->toArray());
    }

    protected function fail(?array $response): JsonResponse
    {
        return response()->json($response);
    }
}
