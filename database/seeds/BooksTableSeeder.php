<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
            [
                'title' => 'ドラゴンボール',
                'genre' => 1,
                'book_volume' => 42,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Dr.スランプ アラレちゃん',
                'genre' => 2,
                'book_volume' => 18,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => '名探偵コナン',
                'genre' => 3,
                'book_volume' => 98,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => '進撃の巨人',
                'genre' => 8,
                'book_volume' => 31,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'ワンピース',
                'genre' => 1,
                'book_volume' => 96,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'ゴルゴ13',
                'genre' => 12,
                'book_volume' => 196,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'NARUTO',
                'genre' => 1,
                'book_volume' => 72,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'こちら葛飾区亀有公園前派出所',
                'genre' => 12,
                'book_volume' => 11,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => '美味しんぼ',
                'genre' => 14,
                'book_volume' => 13,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'スラムダンク SLAMDUNK',
                'genre' => 5,
                'book_volume' => 31,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'ブリーチ BLEACH',
                'genre' => 1,
                'book_volume' => 74,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'タッチ [文庫版]',
                'genre' => 5,
                'book_volume' => 14,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'はじめの一歩',
                'genre' => 5,
                'book_volume' => 127,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'バガボンド',
                'genre' => 18,
                'book_volume' => 37,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'バキBAKI',
                'genre' => 1,
                'book_volume' => 31,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'HUNTER×HUNTERハンター×ハンター',
                'genre' => 1,
                'book_volume' => 36,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => '鋼の錬金術師',
                'genre' => 1,
                'book_volume' => 27,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'キングダム',
                'genre' => 18,
                'book_volume' => 57,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'テニスの王子様',
                'genre' => 2,
                'book_volume' => 42,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'H2 [文庫版]　',
                'genre' => 5,
                'book_volume' => 20,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
            ]);
            
        // for( $cnt = 1; $cnt <= 30; $cnt++ ) { 
        //     $faker = Faker\Factory::create('ja_JP');
        
        //     DB::table('books')->insert([
        //     'title' => "サンプル" . $cnt,
        //     'genre' => $faker->numberBetween($min = 1, $max = 20),
        //     'book_volume' => $faker->numberBetween($min = 10, $max = 100),
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now(),
        //     ]);
        // }

    }
}
