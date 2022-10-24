<?php

namespace App\FinanceHistory\Queries;

use App\Models\FinanceHistory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class FinanceHistoryQuery
{
    private Builder $baseQuery;

    public function __construct()
    {
        $this->baseQuery = FinanceHistory::query();
    }

    private function getBaseQuery(): Builder
    {
        return $this->baseQuery;
    }

    public function setCategoryKeyFilter(string $key): void
    {
        $this->baseQuery->where('category', $key);
    }

    public function setDescriptionKeyFilter(string $key): void
    {
        $this->baseQuery->where('description', $key);
    }

    public function setExpensesFilter(): void
    {
        $this->baseQuery
            ->selectRaw('sum(abs(amount)),category')
            ->where('amount', '<=', '0')
            ->groupBy('category');
    }

    public function get(): Collection|array
    {
        return $this->getBaseQuery()->get();
    }
}
