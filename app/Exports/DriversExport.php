<?php

namespace App\Exports;

use App\Models\Driver;
use Maatwebsite\Excel\Concerns\FromCollection;

class DriversExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // return Driver::all();
        return Driver::select(
            'driver_name',
            'phone_number',
            'address',
            'driver_pay',
            'driver_nrc',



        )->get();
    }
}
