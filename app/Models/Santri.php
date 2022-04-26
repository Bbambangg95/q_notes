<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Santri extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeFilter($query, $search)
    {
        return $query->when($search, function ($query, $search) {
            return $query->where('nama', 'like', "%{$search}%")->orWhere('asal', 'like', "%{$search}%");
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function absensi()
    {
        return $this->hasMany(Absensi::class);
    }

    public function hafalan()
    {
        return $this->hasMany(Hafalan::class);
    }
    public function getRouteKeyName()
    {
        return 'id_santri';
    }
}
