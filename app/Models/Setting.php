<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Setting extends Model
{
    use HasFactory;

    public static function getSetting($key)
    {
        if (Cache::has('setting_' . $key)) {
            return Cache::get('setting_' . $key);
        }

        return null;
    }
}
