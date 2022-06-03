<?php

namespace App\Imports;

use App\Pricing;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportPricing implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Pricing([
            'items_id' => $row[0],
            'cost_price' => 5.00,
            'selling_price' => 5.00
        ]);
    }
}
