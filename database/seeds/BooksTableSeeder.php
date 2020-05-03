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
        // DB::table('books')->insert([
        //     [
        //         'title' => 'ドラゴンボール',
        //         'genre' => 1,
        //         'book_volume' => 42,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         'title' => 'Dr.スランプ アラレちゃん',
        //         'genre' => 2,
        //         'book_volume' => 18,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     [
        //         'title' => '名探偵コナン',
        //         'genre' => 3,
        //         'book_volume' => 100,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ],
        //     ]);
            
        for( $cnt = 1; $cnt <= 30; $cnt++ ) { 
            $faker = Faker\Factory::create('ja_JP');
        
            DB::table('books')->insert([
            'title' => "サンプル" . $cnt,
            'genre' => $faker->numberBetween($min = 1, $max = 20),
            'book_volume' => $faker->numberBetween($min = 10, $max = 100),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            ]);
        }

    }
}
