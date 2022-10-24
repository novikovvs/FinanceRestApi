<?php

namespace App\FinanceHistory\Queries;

use App\Models\FinanceHistory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class FinanceHistoryQuery
{
    public const START_PERIOD = 'start';

    public const END_PERIOD = 'end';

    private Builder|FinanceHistory $baseQuery;

    public function __construct()
    {
        $this->baseQuery = FinanceHistory::query();
    }

    private function getBaseQuery(): Builder
    {
        return $this->baseQuery;
    }

    public function setCategoryKeyFilter(string $param): void
    {
        $this->baseQuery->where('category', $param);
    }

    public function setDescriptionKeyFilter(string $param): void
    {
        $this->baseQuery->where('description', $param);
    }

    public function setPeriod(string $param, string $type): void
    {
        switch ($type) {
            case self::START_PERIOD:

                $this->getBaseQuery()->where('operation_datetime', '>', $param);
                break;

            case self::END_PERIOD:

                $this->getBaseQuery()->where('operation_datetime', '<=', $param);
                break;
        }
    }

    public function setExpensesFilter(): void
    {
        $this->baseQuery
            ->selectRaw('sum(amount),category')
            ->where('amount', '<=', '0')
            ->groupBy('category');
    }

    public function get(): Collection|array
    {
        return $this->getBaseQuery()->get();
    }
}
