<?php

namespace App\Imports;

use App\Models\Car;
use Maatwebsite\Excel\Concerns\ToModel;

class CarImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */






    public function model(array $row)
    {
        return new Car([
            'car_brand_name' => $row[0],
            'car_type' => $row[1],
            'car_model' => $row[2],
            'car_model_year' => $row[3],
            'plate_number' => $row[4],
            'car_color' => $row[5],


            'mileage' => $row[6],
            'car_image' => $row[7],

            'owner_name' => $row[8],
            'phone_number' => $row[9],
            'owner_id_front' => $row[10],
            'owner_id_back' => $row[11],

            'engine_power' => $row[12],
            'nrc_number' => $row[13],
            'address' => $row[14],
            'owner_pay' => $row[15],
            'message' => isset($row[16]) ? $row[16] : null



        ]);
    }
}
