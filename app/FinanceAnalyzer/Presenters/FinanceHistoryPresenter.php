<?php

namespace App\FinanceAnalyzer\Presenters;

use App\FinanceAnalyzer\Filters\FinanceHistoryFilter;
use App\FinanceAnalyzer\Queries\FinanceHistoryQuery;
use App\FinanceAnalyzer\ResourceModels\ExpensesResourceModel;
use Illuminate\Support\Collection;

class FinanceHistoryPresenter
{
    public function __construct(
        private ExpensesResourceModel $resourceModel
    )
    {
    }

    public function present(FinanceHistoryQuery $query, FinanceHistoryFilter $filter): array
    {
        $filter->setFilters($query);

        return $this->resourceModel->fromCollection($query->get());
    }
}
