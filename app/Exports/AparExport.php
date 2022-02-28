<?php

namespace App\Exports;

use App\Models\DataApar;
use Maatwebsite\Excel\Excel;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Events\BeforeWriting;
use Maatwebsite\Excel\Concerns\FromCollection;

class AparExport implements WithEvents
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function registerEvents(): array
    {
        return [
            BeforeWriting::class  => function (BeforeWriting $event) {
                $event->writer->reopen(new \Maatwebsite\Excel\Files\LocalTemporaryFile(storage_path('LAPORAN DATA APAR.xlsx')), Excel::XLSX);
                $event->writer->getSheetByIndex(0);
                return $event->getWriter()->getSheetByIndex(0);
            }
        ];
    }
}
