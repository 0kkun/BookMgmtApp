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


        //カテゴリごとの合計を計算する
        // mapで連想配列を生成、genreでグループ化し、amountを合計している.最終的にオブジェクトができる
        $totalByGenre = $current_shelfs->get()->map(function ($shelf, $key) {
            return [
                'genre' => $shelf->book->genre_label,
                'amount' => $shelf->finished_amount
            ];
        })->groupBy('genre')->map(function ($item) {
            return $item->sum('amount');
        });

        // オブジェクトを連想配列に変換し、ソートで降順にし、top5のみ抽出
        $totalByGenre_array = json_decode(json_encode($totalByGenre), true);
        arsort($totalByGenre_array);
        $top5TotalByGenre = array_slice($totalByGenre_array, 0, 5);

        // グラフに渡すためにgenreとamountの配列生成
        $genre = array();
        $amount = array();
        foreach ($top5TotalByGenre as $key => $value) {
            array_push($genre, $key);
            array_push($amount, $value);
        }


        $colorArray = array("#BB5179", "#FAFF67", "#58A27C", "#3C00FF", "#00FFFF");


        $params = [
            'user' => $user,
            'sum' => $sum,
            'colorArray' => $colorArray, 
            'position' => $position,
            'genre' =>$genre,
            'amount' =>$amount,

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
