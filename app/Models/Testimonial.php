<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    public const STATUS_ACTIVE = 1;
    public const STATUS_INACTIVE = 0;

    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }

    protected $fillable = [
        'name',
        'testimonial',
        'tour_id',
        'status'
    ];
}
