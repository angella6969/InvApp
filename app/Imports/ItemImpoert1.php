<?php

namespace App\Imports;

use App\Models\item;
use Maatwebsite\Excel\Concerns\ToModel;

class ItemImpoert1 implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new item([
            'name' => $row[0],
            'item_code' => $row[1],
            'location' => $row[2],
            'brand' => $row[3],
            'owner' => $row[4],
            'status' => $row[5],
            'category_id' => $row[6],
        ]);
    }
}
