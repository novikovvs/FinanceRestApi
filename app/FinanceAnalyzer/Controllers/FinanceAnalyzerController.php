<?php

namespace App\FinanceAnalyzer\Controllers;

use App\FinanceAnalyzer\Jobs\UploadJob;
use App\FinanceAnalyzer\Requests\UploadRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class FinanceAnalyzerController extends Controller
{
    public function upload(UploadRequest $request): JsonResponse
    {
        $job = new UploadJob($request->file('upload_file')->store('/uploads/csv/'));

        dispatch($job);

        return $this->success();
    }
}
