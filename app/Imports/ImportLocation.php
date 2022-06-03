<?php

namespace App\Imports;

use App\Location;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportLocation implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Location([
            //
        ]);
    }
}
