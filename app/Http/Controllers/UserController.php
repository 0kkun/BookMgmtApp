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
        $myShelfs = Shelf::where('user_id', $user->id);

        $plucked = $myShelfs->pluck('finished_amount'); //pluckメソッドでfinished_amountを抽出
        // dd($plucked);
        $sum = $plucked->sum();

        // $groupByGenre = $myShelfs->book()->groupBy('genre');
        // $pluckedByGroup = $groupByGenre->pluck('finished_amount');
        // $sumByGenre = $pluckedByGroup->sum();
        // dd($sumByGenre);

        $shelfWithBooks = $myShelfs->with('book')->get();
        $hoge = array();

        foreach($shelfWithBooks as $shelfWithBook){
            $myGenre[] = $shelfWithBook->book->genre_label;
            $myAmount[] = $shelfWithBook->finished_amount;
        }
        $combine = array_map(null, $myGenre, $myAmount); //配列を二次元的にくっつけている
        // dd($myGenre);
        // dd($myAmount);
        
        $as_total = array_sum(array_column($combine, '1'));
        dd($as_total);

        // $groupByGenre = $shelfWithBook->groupBy('genre');

        // $oneGenre = $groupByGenre->where('genre','2');
        // $oneGenrePluckedSum = $groupByGenre->pluck('finished_amount')->sum();
        
        // dd($oneGenrePluckedSum);
 
        // $genre = $shelfWithBook->pluck('genre')->first();
        // dd($shelfWithBook);
       
        $colorArray = array("#BB5179", "#FAFF67", "#58A27C", "#3C00FF");

        $params = [
            'user' => $user,
            'sum' => $sum,
            'colorArray' => $colorArray, 
            'shelfWithBook'=>$shelfWithBook,
        ];
        return view('users.show', $params);
    }
}

// 会員たちを出身地（pref）ごとに分けたい場合
// $grouped = $collection->groupBy('pref');
// [genre => finished_amount]という配列を作りたい
// shelfのbook_idからbookテーブルのidを検索し、そのレコードのgenreを抽出したい
// $filtered = $collection->pluck('name', 'id');　nameがバリュー、idがキー
// Group::with('users')->get();