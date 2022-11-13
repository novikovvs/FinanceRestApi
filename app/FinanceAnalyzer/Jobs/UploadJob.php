<?php

namespace App\FinanceAnalyzer\Jobs;

use App\Imports\FinanceHistoryImport;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Maatwebsite\Excel\Facades\Excel;

class UploadJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        private ?string $file_path
    )
    {
    }

    public function handle(): void
    {
        $financeHistoryImport = new FinanceHistoryImport();

        Excel::import(
            $financeHistoryImport,
            $this->file_path,
            null,
            \Maatwebsite\Excel\Excel::CSV
        );

        dispatch(new AnalyticJob());
    }
}
