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
            // shelfsモデルにbook_idとuser_idの組み合わせがすでに存在するかチェック
            // 'book_id' => [
            //     'required',
            //     Rule::unique('shelfs')->ignore($this->input('id'))->where(function($query) {
            //         $query->where('user_id', $this->input('user_id'));
            //     }),
            // ],
        ];
    }


    public function attributes()
    {
        return [
            'status'          => 'ステータス',
            'finished_amount' => '完了数',
            'point'           => '評価点数',
            'book_id' => '本',
        ];
    }
}
