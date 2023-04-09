<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class item extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo(category::class);
    }
    public function rent_log()
    {
        return $this->belongsToMany(rent_log::class);
    }

    public function scopeFilter($query, array $Filters)
    {
        // if (isset($Filters['search']) ? $Filters['search'] : false ) {
        //     return  $query->where('name', 'like', '%' . $Filters['search'] . '%')
        //          ->orWhere('item_code', 'like', '%' . $Filters['search'] . '%');
        // }

        $query->when($Filters['search'] ?? false, function ($query, $search) {
            return  $query->where('name', 'like', '%' . $search . '%');
            // ->orWhere('item_code', 'like', '%' . $search . '%');
            // ->orWhere('status', 'like', '%' . $search . '%');
            // ->orWhere('brand', 'like', '%' . $search . '%')
            // ->orWhere('owner', 'like', '%' . $search . '%');
        });
        $query->when($Filters['categories'] ?? false, function ($query, $categories) {
            return $query->WhereHas('category', function ($query) use ($categories) {
                $query->where('categories.id', $categories);
            });
        });
    }
}
