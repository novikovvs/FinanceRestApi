<?php

namespace App\FinanceAnalyzer\Controllers;

use App\FinanceHistory\Requests\UploadRequest;
use App\Http\Controllers\Controller;
use App\Imports\FinanceHistoryImport;
use Illuminate\Http\JsonResponse;
use Maatwebsite\Excel\Facades\Excel;

class FinanceAnalyzerController extends Controller
{
    public function upload(UploadRequest $request): JsonResponse
    {
        Excel::import(
            new FinanceHistoryImport,
            $request->file('upload_file'),
            null,
            \Maatwebsite\Excel\Excel::CSV
        );

        return $this->success();
    }
}
