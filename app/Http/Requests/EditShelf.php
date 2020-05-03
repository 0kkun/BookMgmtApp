<?php

namespace App\Http\Requests;

use App\Shelf;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class EditShelf extends CreateShelf
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // public function authorize()
    // {
    //     return true;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rule = parent::rules();

        // 入力値が許可リストに含まれているか検証する in ルールを使用。1~3のどれかになっているか？
        $status_rule = Rule::in(array_keys(Shelf::STATUS));

        return $rule + [
            'status' => 'required|' . $status_rule,
        ];
    }


    // 親クラス CreateTask の rules メソッドの結果と合体したルールリストを返却
    public function attributes()
    {
        $attributes = parent::attributes();

        return $attributes + [
            'status' => '状態',
        ];
    }


    public function messages()
    {
        $messages = parent::messages();

        $status_labels = array_map(function($item) {
            return $item['label'];
        }, Shelf::STATUS);

        $status_labels = implode('、', $status_labels);

        return $messages + [
            'status.in' => ':attribute には ' . $status_labels. ' のいずれかを指定してください。',
        ];
    }


}
