<?php

namespace App\Http\Resources;

use App\Models\TourMedia;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class TourResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $image = $this->tourMedia->where('type', TourMedia::TYPE_FEATURE_IMAGE)->first();
        $path = ($image) ? $image->image_path : null;

        if (Storage::disk('public')->exists($path)) {
            $featuredImageUrl = asset('storage/' . $path);
        } else {
            $featuredImageUrl = asset('themes/images/deafult-image.jpg');
        }

        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'featured_image_url' => $featuredImageUrl,
            'status' => $this->status,
            'days' => $this->days,
            'country' => $this->country->name
        ];
    }
}
