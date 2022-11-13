<?php

namespace App\FinanceAnalyzer\Queries;

use App\Models\FinanceHistory;
use Illuminate\Database\Query\Builder;

class FinanceHistoryQuery
{
    public function getBaseQuery(): FinanceHistory|Builder
    {
        return FinanceHistory::query();
    }
}
