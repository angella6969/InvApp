<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class category extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function items()
    {
        return $this->hasMany(item::class);
    }

    public function preventDelete()
    {
        if (DB::table('items')->where('category_id', $this->id)->count() > 0) {
            throw new \Exception('Data tidak dapat dihapus karena terdapat constraint yang terkait.');
        }
    }
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($item) {
            $item->preventDelete();
        });
    }
}
