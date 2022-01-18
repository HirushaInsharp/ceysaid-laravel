<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourMedia extends Model
{
    use HasFactory;

    public const TYPE_FEATURE_IMAGE = 1;
    public const TYPE_BACKGROUND_IMAGE = 2;
    public const TYPE_SLIDER_IMAGE = 3;
    public const TYPE_TOUR_PDF = 4;

    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }
}
