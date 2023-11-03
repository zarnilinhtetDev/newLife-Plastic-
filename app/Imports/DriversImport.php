<?php

namespace App\Imports;

use App\Models\Driver;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class DriversImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Driver([
            'driver_name'     => $row[0],
            'phone_number'    => $row[1],
            'address' => $row[2],
            'driver_nrc' => $row[3],




        ]);
    }
}
