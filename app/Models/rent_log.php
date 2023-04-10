<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rent_log extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function category()
    {
        return $this->belongsTo(category::class);
    }

    public function item()
    {
        return $this->belongsTo(item::class);
    }
    public function user()
    {
        return $this->belongsTo(user::class);
    }


    public function scopeFilter($query, array $Filters)
    {
     
        $query->when($Filters['search'] ?? false, function ($query, $search) {
            return  $query->where('user_id', 'like', '%' . $search . '%');
        });
    }
}
