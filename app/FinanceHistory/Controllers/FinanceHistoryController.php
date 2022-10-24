<?php

namespace App\FinanceHistory\Controllers;

use App\FinanceHistory\Filters\FinanceHistoryFilter;
use App\FinanceHistory\Presenters\FinanceHistoryPresenter;
use App\FinanceHistory\Queries\FinanceHistoryQuery;
use App\FinanceHistory\Requests\GetExpensesRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class FinanceHistoryController extends Controller
{
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
