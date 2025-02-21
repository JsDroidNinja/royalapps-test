<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
    public function rules() {
        return [
            'author_id' => 'required|integer',
            'title' => 'required|string|max:255',
            'release_date' => 'required|date',
            'description' => 'required|string',
            'isbn' => 'required|string|max:20',
            'format' => 'required|string|max:50',
            'number_of_pages' => 'required|integer|min:1',
        ];
    }
}
