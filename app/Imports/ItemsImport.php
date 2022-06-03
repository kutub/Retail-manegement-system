<?php

namespace App\Imports;

use App\Items;
use Maatwebsite\Excel\Concerns\ToModel;

class ItemsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd();
        return new Items([
            'name' => @$row[0],
            'generic' => @$row[0],
            'category_id' => 1,
            'supplier_id' => 1,
        ]);
    }
}
