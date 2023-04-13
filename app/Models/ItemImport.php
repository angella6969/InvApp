<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\item;


class ItemImport extends Model
{
    use HasFactory;
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
