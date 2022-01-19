<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourDataGroup extends Model
{
    use HasFactory;

    public const PRICE_INCLUDE = 1;
    public const PRICE_EXCLUDE = 2;

    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }

    public function tourData()
    {
        return $this->hasMany(TourData::class);
    }
}
