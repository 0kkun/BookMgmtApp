<?php

namespace App\Http\Requests;

use App\Book;
use Illuminate\Validation\Rule;


class EditBook extends CreateBook
{

    public function rules()
    {
        $rule = parent::rules();

        $genre_rule = Rule::in(array_keys(Book::GENRE));

        return $rule + [
            'genre' => 'required|' . $genre_rule,
        ];
    }


    public function attributes()
    {
        $attributes = parent::attributes();

        return $attributes + [
            'genre' => 'ジャンル',
        ];
    }




    public function messages()
    {
        $messages = parent::messages();

        $genre_labels = array_map(function($item) {
            return $item['label'];
        }, Book::GENRE);

        $genre_labels = implode('、', $genre_labels);

        return $messages + [
            'genre.in' => ':attribute にはいずれかを指定してください。',
        ];
    }
}
