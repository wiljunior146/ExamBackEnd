<?php

namespace App\Http\Requests\Photo;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
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
        return [
            'album_id' => 'required|integer|exists:albums,id',
            'title' => 'required|string|max:255',
            'url' => 'required|string|url|max:255',
            'thumbnail_url' => 'required|string|url|max:255'
        ];
    }
}
