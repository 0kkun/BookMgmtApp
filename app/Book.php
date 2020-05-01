<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    // アクセサを使ってstatusの値によってテキストを定義する
    const GENRE = [
        0 => [ 'label' => '---'],
        1 => [ 'label' => 'バトル'],
        2 => [ 'label' => 'ギャグ'],
        3 => [ 'label' => '推理・ミステリー'],
        4 => [ 'label' => 'ホラー'],
        5 => [ 'label' => 'スポーツ'],
        6 => [ 'label' => 'SF'],
        7 => [ 'label' => 'ファンタジー'],
        8 => [ 'label' => '異世界転生'],
        9 => [ 'label' => 'ラブコメ'],
        10 => [ 'label' => '恋愛'],
        11 => [ 'label' => 'フィクション'],
        12 => [ 'label' => 'ノンフィクション'],
        13 => [ 'label' => 'グルメ'],
        14 => [ 'label' => 'BL'],
        15 => [ 'label' => 'ヤンキー'],
        16 => [ 'label' => '小説'],
        17 => [ 'label' => '歴史'],
        18 => [ 'label' => 'ビジネス'],
        19 => [ 'label' => '専門書'],
        20 => [ 'label' => '自己啓発'],
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
