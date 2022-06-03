<?php

namespace App\Imports;

use App\Image;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportImage implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Image([
            'image' => 'images.jpeg',
            'items_id' => $row[0],
            
        ]);
    }
}
