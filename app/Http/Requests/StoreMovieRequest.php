<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMovieRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'casts' => 'required|array',
            'casts.*' => 'string|max:255',
            'release_date' => 'required|date_format:d-m-Y',
            'director' => 'required|string|max:255',
            'ratings' => 'required|array',
            'ratings.imdb' => 'required|numeric|min:0|max:10',
            'ratings.rotten_tomatto' => 'required|numeric|min:0|max:10',
        ];
    }
}
