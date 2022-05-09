<?php

namespace App\Exports;

use App\Models\Culture;
use Maatwebsite\Excel\Concerns\FromCollection;

class CulturesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Culture::all();
    }
}
