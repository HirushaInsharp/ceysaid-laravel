<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourData extends Model
{
    use HasFactory;

    public const PRICE_INCLUDE = 1;
    public const PRICE_EXCLUDE = 2;

    public function tourDataGroup()
    {
        return $this->belongsTo(TourDataGroup::class);
    }
}
