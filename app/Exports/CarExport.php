<?php

namespace App\Exports;

use App\Models\Car;
use Maatwebsite\Excel\Concerns\FromCollection;

class CarExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // return Car::all();
        return Car::select(
            'car_brand_name',
            'car_type',
            'car_model',
            'car_model_year',
            'plate_number',
            'car_color',

            'mileage',
            'car_image',
            'owner_name',
            'phone_number',
            'owner_id_front',
            'owner_id_back',

            'engine_power',
            'nrc_number',
            'address',

            'owner_pay',
            'message'
        )->get();
    }
}
