<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    // アクセサを使ってstatusの値によってテキストを定義する
    const GENRE = [
        0 => [ 'genre' => '---'],
        1 => [ 'genre' => 'バトル'],
        2 => [ 'genre' => 'ギャグ'],
        3 => [ 'genre' => '推理・ミステリー'],
        4 => [ 'genre' => 'ホラー'],
        5 => [ 'genre' => 'スポーツ'],
        6 => [ 'genre' => 'SF'],
        7 => [ 'genre' => 'ファンタジー'],
        8 => [ 'genre' => '異世界転生'],
        9 => [ 'genre' => 'ラブコメ'],
        10 => [ 'genre' => '恋愛'],
        11 => [ 'genre' => 'フィクション'],
        12 => [ 'genre' => 'ノンフィクション'],
        13 => [ 'genre' => 'グルメ'],
        14 => [ 'genre' => 'BL'],
        15 => [ 'genre' => 'ヤンキー'],
        16 => [ 'genre' => '小説'],
        17 => [ 'genre' => '歴史'],
        18 => [ 'genre' => 'ビジネス'],
        19 => [ 'genre' => '専門書'],
        20 => [ 'genre' => '自己啓発'],
    ];


 /**
     * 状態のラベル
     * @return string
     */


    public function getGenreLabelAttribute()
    {
        // 状態値
        $genre = $this->attributes['genre'];

        // 定義されていなければ空文字を返す
        if (!isset(self::GENRE[$genre])) {
            return '';
        }

        return self::GENRE[$genre]['label'];
    }

}
