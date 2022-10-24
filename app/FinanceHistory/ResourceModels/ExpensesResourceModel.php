<?php

namespace App\FinanceHistory\ResourceModels;

use App\Models\FinanceHistory;
use App\ResouceModels\BaseResourceModels\BaseResourceModel;
use Illuminate\Support\Collection;

class ExpensesResourceModel extends BaseResourceModel
{
    public float $amount;

    public ?string $category;

    public ?string $description;

    public ?string $operationDatetime;

    public ?string $mss;

    /**
     * @param Collection $collection
     * @return array<ExpensesResourceModel>
     */
    public function fromCollection(Collection $collection): array
    {
        $items = [];

        /**
         * @var FinanceHistory $item
         */
        foreach ($collection as $item) {
            $instance = new ExpensesResourceModel();
            $instance->amount = $item->sum ?? $item->amount;
            $instance->category = $item->category ?? null;
            $instance->description = $item->description ?? null;
            $instance->mss = $item->MSS ?? null;
            $instance->operationDatetime = $item->operation_datetime ?? null;
            $items[] = $instance;
        }

        return $items;
    }
}
