<?php

namespace App\Imports;

use App\Models\FinanceHistory;
use Carbon\Carbon;

use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithStartRow;

class FinanceHistoryImport implements ToModel, WithCustomCsvSettings, WithStartRow
{
    use Importable;

    /**
     * @param array $row
     *
     * @return FinanceHistory|null
     */
    public function model(array $row): FinanceHistory|null
    {
        $timestamp = Carbon::make($row[0]);
        if ($timestamp && !FinanceHistory::where('operation_datetime', $timestamp)->exists()) {
            return new FinanceHistory([
                'operation_datetime' => $timestamp,
                'amount' => (float)$row[4],
                'category' => $row[9],
                'MSS' => (float)$row[10],
                'description' => $row[11],
            ]);
        }
        return null;
    }

    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ';',
            'input_encoding' => 'windows-1251'
        ];
    }

    public function startRow(): int
    {
        return 2;
    }
}
