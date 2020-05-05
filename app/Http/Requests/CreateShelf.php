<?php

namespace App\Http\Requests;

use App\Book;
use App\Shelf;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateShelf extends FormRequest
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
            'status'          => 'not_in: 0',
            'finished_amount' => 'required | integer | between:0,1000',
            'point'           => 'required | integer | between:0,100',
            // 'book_id' => 'unique:shelfs,book_id,' . $this->id,
            // 'book_id' => [
            //     Rule::unique('shelfs')->ignore($this->book_id)
            // ]
            // 'book_id' => [Rule::unique('shelfs')->ignore($this->id)]
            // 'book_id' =>  ['unique:shelf']
            // 'book_id' => ['exists:connection.shelfs,book_id'],
        ];
    }


    public function attributes()
    {
        return [
            'status'          => 'ステータス',
            'finished_amount' => '完了数',
            'point'           => '評価点数',
        ];
    }
}
