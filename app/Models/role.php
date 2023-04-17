<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class role extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function preventDelete()
    {
        if (DB::table('users')->where('role_id', $this->id)->count() > 0) {
            throw new \Exception('Data tidak dapat dihapus karena terdapat constraint yang terkait.');
        }
    }
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($user) {
            $user->preventDelete();
        });
    }
}
