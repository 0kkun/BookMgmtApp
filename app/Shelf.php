<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shelf extends Model
{
    // アクセサを使ってstatusの値によってテキストを定義する
    const STATUS = [
        0 => [ 'label' => '---'],
        1 => [ 'label' => '読み終わった'],
        2 => [ 'label' => '読んでいる途中'],
        3 => [ 'label' => 'これから読みたい'],
    ];
    

    public function book()
    {
        return $this->belongsTo('App\Book');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function getStatusLabelAttribute()
    {
        // 状態値
        $status = $this->attributes['status'];

        // 定義されていなければ空文字を返す
        if (!isset(self::STATUS[$status])) {
            return '';
        }

        return self::STATUS[$status]['label'];
    }

    // 明示的にテーブル名を指定しないと、自動的に複数形のスネークケース(shelves)になってしまう
    protected $table = 'shelfs';
}
