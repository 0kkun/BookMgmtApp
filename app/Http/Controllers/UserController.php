<?php

namespace App\Http\Controllers;

use App\User;
use App\Shelf;
use App\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showProfile(){

        $user = Auth::user();
        $current_shelfs = Shelf::where('user_id', $user->id);
        $sum= $current_shelfs->pluck('finished_amount')->sum(); //pluckメソッドでfinished_amountを抽出し合計
        $position = self::positionCreate($sum);


        $shelfWithBooks = $current_shelfs->with('book')->get();
        $tests = $shelfWithBooks->where('user_id', $user->id);

        foreach($tests as $test){
            $myGenre[] = $test->book->genre_label;
            $myAmount[] = $test->finished_amount;
        }
        $combine = array_map(null, $myGenre, $myAmount); //配列を二次元的にくっつけている


        $as_total = array_sum(array_column($combine, '1'));


        $colorArray = array("#BB5179", "#FAFF67", "#58A27C", "#3C00FF");

        $params = [
            'user' => $user,
            'sum' => $sum,
            'colorArray' => $colorArray, 
            'position' => $position,
        ];
        return view('users.show', $params);
    }




    private static function positionCreate($sum){
        if($sum <= 99){
            $position="にわか";
        } elseif(100 <= $sum && $sum <= 199 ) {
            $position="ちょいオタ";
        }elseif(200 <= $sum && $sum <= 299) {
            $position="オタク";
        }elseif( 300 <= $sum && $sum <= 499 ) {
            $position="ガチオタ";
        }elseif( 500 <= $sum  ) {
            $position="本の神様";
        }
        return $position;
    }
}




// 会員たちを出身地（pref）ごとに分けたい場合
// $grouped = $collection->groupBy('pref');
// [genre => finished_amount]という配列を作りたい
// shelfのbook_idからbookテーブルのidを検索し、そのレコードのgenreを抽出したい
// $filtered = $collection->pluck('name', 'id');　nameがバリュー、idがキー
// Group::with('users')->get();

// $groupByGenre = $myShelfs->book()->groupBy('genre');
// $pluckedByGroup = $groupByGenre->pluck('finished_amount');
// $sumByGenre = $pluckedByGroup->sum();
// dd($sumByGenre);

// $groupByGenre = $shelfWithBook->groupBy('genre');

// $oneGenre = $groupByGenre->where('genre','2');
// $oneGenrePluckedSum = $groupByGenre->pluck('finished_amount')->sum();

// dd($oneGenrePluckedSum);

// $genre = $shelfWithBook->pluck('genre')->first();
// dd($shelfWithBook);