<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class laporan extends Model
{
    use HasFactory;


    public function scopeFilter($query, array $Filters)
    {
        

        $query->when($Filters['from_date'] ?? false, function ($query, $from_date) {
            return  $query->where('created_at','like', '%' . $from_date . '%' );
        });
        $query->when($Filters['search'] ?? false, function ($query, $search) {
            return  $query->where('name', 'like', '%' . $search . '%');
                // ->orWhere('item_code', 'like', '%' . $search . '%');
                // ->orWhere('status', 'like', '%' . $search . '%');
                // ->orWhere('brand', 'like', '%' . $search . '%')
                // ->orWhere('owner', 'like', '%' . $search . '%');
        });
    }
}
