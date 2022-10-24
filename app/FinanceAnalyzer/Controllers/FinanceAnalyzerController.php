<?php

namespace App\FinanceAnalyzer\Controllers;

use App\FinanceAnalyzer\Filters\FinanceHistoryFilter;
use App\FinanceAnalyzer\Presenters\FinanceHistoryPresenter;
use App\FinanceAnalyzer\Queries\FinanceHistoryQuery;
use App\FinanceAnalyzer\Requests\GetExpensesRequest;
use App\FinanceAnalyzer\Requests\UploadRequest;
use App\Http\Controllers\Controller;
use App\Imports\FinanceHistoryImport;
use App\Jobs\SaveFinance;
use App\Models\FinanceHistory;
use App\Models\ImportCSV;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Request;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

class FinanceAnalyzerController extends Controller
{
    /**
     * @throws FileIsTooBig
     * @throws FileDoesNotExist
     */
    function upload(UploadRequest $request): JsonResponse
    {
        Excel::import(
            new FinanceHistoryImport,
            $request->file('upload_file'),
            null,
            \Maatwebsite\Excel\Excel::CSV
        );


        return $this->success();
    }

    function getExpenses(
        GetExpensesRequest      $request,
        FinanceHistoryQuery     $query,
        FinanceHistoryPresenter $presenter
    ): JsonResponse
    {
        $filter = FinanceHistoryFilter::createFromRequest($request);

        return $this->success($presenter->present($query, $filter));
    }
}
