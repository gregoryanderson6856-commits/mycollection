<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreAlbumRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'band_id' => 'required|integer|min:1|max:50',
            'title' => 'required|string|max:250',
            'label' => 'required|string|max:250',
            'year' => 'required|string|max:250',
            'format' => 'required|string|max:250',
            'path' => 'required|string|max:250',
        ];
    }
}
