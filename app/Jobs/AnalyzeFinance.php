<?php

namespace App\Jobs;

use App\Imports\FinanceHistoryImport;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Maatwebsite\Excel\Facades\Excel;

class AnalyzeFinance implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        private ?string $file_path
    ) {
    }

    public function handle(): void
    {
        Excel::import(
            new FinanceHistoryImport,
            $this->file_path,
            null,
            \Maatwebsite\Excel\Excel::CSV
        );
    }
}
