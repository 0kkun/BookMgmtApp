<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBook extends FormRequest
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
            'title' => 'required|max:30',
            // 'title' => 'required|unique:books|max:30',
            // 'title' => 'required||max:30|unique:books,title'.$this->me->title.title',
            // 'title' => 'required|max:30|unique:books,title,'.$this->title.',title',
            'genre' => 'not_in: 0',
            'book_volume' => 'required | integer | between:1,1000',
        ];
    }



    public function attributes()
    {
        return [
            'title' => 'タイトル',
            'genre' => 'ジャンル',
            'book_volume' => '総巻数',
        ];
    }

    public function messages()
    {
        return [
            'genre.not_in' => 'ジャンルが選択されていません。',
        ];
    }
}

