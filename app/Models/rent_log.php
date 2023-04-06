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
    public function users()
    {
        return $this->belongsTo(category::class);
    }
    public function items()
    {
        return $this->belongsTo(item::class);
    }
}
