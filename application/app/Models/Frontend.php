<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Frontend extends Model
{
    protected $casts = [
        'data_values' => 'object'
    ];

    public static function scopeGetContent($data_keys)
    {
        return Frontend::where('data_keys', $data_keys);
    }

    public function getCreatedAtAttribute($value)
    {
        $date = \Carbon\Carbon::parse($value);
        return $date->format('d M, Y');
    }
}
