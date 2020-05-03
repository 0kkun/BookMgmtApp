<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shelf extends Model
{

    public function book()
    {

        return $this->belongsTo('App\Book');

    }

    // 明示的にテーブル名を指定しないと、自動的に複数形のスネークケース(shelves)になってしまう
    protected $table = 'shelfs';
}
