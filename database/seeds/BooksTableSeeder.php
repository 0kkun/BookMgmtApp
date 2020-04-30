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
                'book_volume' => 100,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            ]);
    }
}
