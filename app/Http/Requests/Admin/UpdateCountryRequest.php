<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCountryRequest extends FormRequest
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
                'description' => 'nullable|string'
            ];
        } else if ($this->request->get('edit_type') == 'seo') {
            return [
                'meta_keywords' => 'required|string',
                'meta_description' => 'required|string'
            ];
        }
        return [];
    }
}
