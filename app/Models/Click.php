<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Click extends Model
{
    use HasFactory;

    protected $fillable = [
        'ip', 'device_info', 'click_time', 'id_shortlink'
    ];

    public function shortlink()
    {
        return $this->belongsTo(Shortlink::class, 'id_shortlink');
    }

    public $timestamps = false;
}
