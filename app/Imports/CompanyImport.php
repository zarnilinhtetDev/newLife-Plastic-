<?php

namespace App\Imports;

use App\Models\Company;
use Maatwebsite\Excel\Concerns\ToModel;

class CompanyImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Company([
            'name'     => $row[0],
            'phone_number' => $row[1],
            'email' => $row[2],
            'address' => $row[3],
            'branch' => $row[4],




        ]);
    }
}
