<?php

namespace App\FinanceAnalyzer\Filters;

use App\FinanceAnalyzer\Queries\FinanceHistoryQuery;
use Illuminate\Http\Request;

class FinanceHistoryFilter
{
    public ?string $categoryFilter = null;

    public ?string $descriptionFilter = null;

    public ?bool $detailFilter = null;

    public static function createFromRequest(Request $request): FinanceHistoryFilter
    {
        $filter = new FinanceHistoryFilter();

        if ($request->has('category')) {
            $filter->categoryFilter = $request->get('category');
        }

        if ($request->has('description')) {
            $filter->descriptionFilter = $request->get('description');

        }

        if ($request->has('detail')) {
            $filter->detailFilter = $request->get('detail');
        }

        return $filter;
    }


    public function setFilters(FinanceHistoryQuery $query): void
    {
        if ($this->categoryFilter) {
            $query->setCategoryKeyFilter($this->categoryFilter);
        }

        if ($this->descriptionFilter) {
            $query->setDescriptionKeyFilter($this->descriptionFilter);
        }

        if (!$this->detailFilter) {
            $query->setExpensesFilter();
        }
    }
}
