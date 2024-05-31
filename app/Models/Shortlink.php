<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shortlink extends Model
{
    use HasFactory;

    protected $fillable = [
        'real_url', 'short_url', 'id_user', 'created_at', 'updated_at', 'deleted_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function clicks()
    {
        return $this->hasMany(Click::class, 'id_shortlink');
    }
}
