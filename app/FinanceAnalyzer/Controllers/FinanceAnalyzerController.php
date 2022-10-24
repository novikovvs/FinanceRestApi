<?php

namespace App\FinanceAnalyzer\Controllers;

use App\FinanceAnalyzer\Requests\UploadRequest;
use App\Http\Controllers\Controller;
use App\Imports\FinanceHistoryImport;
use App\Jobs\AnalyzeFinance;
use Illuminate\Http\JsonResponse;
use Maatwebsite\Excel\Facades\Excel;

class FinanceAnalyzerController extends Controller
{
    public function upload(UploadRequest $request): JsonResponse
    {
        $job = new AnalyzeFinance($request->file('upload_file')->store('/uploads/csv/'));

        dispatch($job);

        return $this->success();
    }
}
