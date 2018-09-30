<?php

namespace DtechBook\Book\App\Http\Requests\Book;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateBookRequest extends FormRequest
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
            'id' => [
                'numeric',
                'min:1'
            ],
            'title' => [
                'required',
                'max:255',
                Rule::unique('dtech_books', 'title')
                    ->ignore($this->input('id'))
                    ->where(function ($query) {
                    $query->where('title', $this->request->get('title'))
                        ->whereNull('deleted_at');
                    })
            ],
            'author' => [
                'required',
                'max:255'
            ]
        ];
    }
}
