<?php

namespace App\FinanceHistory\Filters;

use App\FinanceHistory\Queries\FinanceHistoryQuery;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FinanceHistoryFilter
{
    public ?string $categoryFilter = null;

    public ?string $descriptionFilter = null;

    public ?bool $detailFilter = null;

    public ?Carbon $startPeriodDate = null;

    public ?Carbon $endPeriodDate = null;

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

        if ($request->has('start_period_date')) {
            $filter->startPeriodDate = Carbon::make($request->get('start_period_date'));
        }

        if ($request->has('end_period_date')) {
            $filter->endPeriodDate = Carbon::make($request->get('end_period_date'));
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

        if ($this->startPeriodDate) {
            $query->setPeriod($this->startPeriodDate, FinanceHistoryQuery::START_PERIOD);
        }

        if ($this->endPeriodDate) {
            $query->setPeriod($this->endPeriodDate, FinanceHistoryQuery::END_PERIOD);
        }

        if (! $this->detailFilter) {
            $query->setExpensesFilter();
        }
    }
}
