<?php

namespace App\Http\Requests\Admin;

use App\Models\Tour;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTourRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if ($this->request->get('edit_type') == 'info') {
            return [
                'name' => 'required|string|max:100',
                'slug' => 'required',
                'country_id' => 'required|integer|exists:countries,id',
                'days' => 'required|integer',
                'main_destinations' => 'required|string',
                'description' => 'nullable|string',
            ];
        } else if ($this->request->get('context') == 'context') {
            return [
                'context' => 'required',
            ];
        } else if ($this->request->get('featured') == 'featured') {
            return [
                'featured_image' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ];
        } else if ($this->request->get('featured') == 'featured') {
            return [
                'background_image_url' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ];
        } else if ($this->request->get('tour_days') == 'tour_days') {
            return [
                'title' => 'sometimes|required|array',
                'day_description' => 'sometimes|required|array',
            ];
        } else if ($this->request->get('edit_type') == 'seo') {
            return [
                'meta_keywords' => 'required|string',
                'meta_description' => 'required|string'
            ];
        }
        return [];
    }

    public function  withValidator($validator)
    {
        if ($this->request->get('edit_type') == 'info') {
            $validator->after(function ($validator) {
                $routeParameter = $this->route()->parameters();
                $tour = $routeParameter['tour'];

                if ($this->request->get('slug') != $tour->slug) {
                    $tourCount = Tour::where('slug', $this->request['slug'] )
                                 ->where('id', '!=', $tour->id)->count();

                    if ($tourCount > 0) {
                        $validator->errors()->add('slug', 'slug already exsits');
                    }
                }
            });
        }
    }
}
