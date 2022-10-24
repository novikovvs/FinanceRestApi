<?php

namespace App\FinanceHistory\Presenters;

use App\FinanceHistory\Filters\FinanceHistoryFilter;
use App\FinanceHistory\Queries\FinanceHistoryQuery;
use App\FinanceHistory\ResourceModels\ExpensesResourceModel;

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
