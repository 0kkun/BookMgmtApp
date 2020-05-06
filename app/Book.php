<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{

    const GENRE = [
        0 => [ 'label' => '---'],
        1 => [ 'label' => 'バトル'],
        2 => [ 'label' => 'ギャグ'],
        3 => [ 'label' => '推理・ミステリー'],
        4 => [ 'label' => 'ホラー'],
        5 => [ 'label' => 'スポーツ'],
        6 => [ 'label' => 'SF'],
        7 => [ 'label' => 'ファンタジー'],
        8 => [ 'label' => 'ダーク・ファンタジー'],
        9 => [ 'label' => '異世界転生'],
        10 => [ 'label' => 'ラブコメ'],
        11 => [ 'label' => '恋愛'],
        12 => [ 'label' => 'フィクション'],
        13 => [ 'label' => 'ノンフィクション'],
        14 => [ 'label' => 'グルメ'],
        15 => [ 'label' => 'BL'],
        16 => [ 'label' => 'ヤンキー'],
        17 => [ 'label' => '小説'],
        18 => [ 'label' => '歴史'],
        19 => [ 'label' => 'ビジネス'],
        20 => [ 'label' => '専門書'],
        21 => [ 'label' => '自己啓発'],
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
