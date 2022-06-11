<?php

namespace App\Imports;

use App\RateChart;
use Maatwebsite\Excel\Concerns\ToModel;

class ChartImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new RateChart([
            'plant_code' => $row[0],
            'city_code' => $row[1],
            'destination' => $row[2],
            'freight' => $row[3],
            'status' =>$row[4],
            'wheel' =>$row[5],
            
        ]);
    }
}
