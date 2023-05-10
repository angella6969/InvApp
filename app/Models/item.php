<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

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
        $query->when($Filters['search'] ?? false, function ($query, $search) {
            return  $query->where('name', 'ilike', '%' . strtolower($search) . '%');
        });

        $query->when($Filters['status'] ?? false, function ($query, $status) {
            return  $query->where('status', 'ilike', '%' . $status . '%');
        });
        $query->when($Filters['categories'] ?? false, function ($query, $categories) {
            return $query->WhereHas('category', function ($query) use ($categories) {
                $query->where('categories.id', $categories);
            });
        });
    }
    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // Ketika ada data baru yang dimasukkan, cache akan dihapus agar data yang baru dimasukkan bisa langsung terlihat
            Cache::forget('model_cache_key');
        });

        static::deleting(function ($item) {
            $item->preventDelete();
        });
    }

    public function preventDelete()
    {
        if (DB::table('rent_logs')->where('item_id', $this->id)->count() > 0) {
            throw new \Exception('Data tidak dapat dihapus karena terdapat constraint yang terkait.');
        }
    }
}
