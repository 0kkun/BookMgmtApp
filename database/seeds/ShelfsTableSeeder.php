<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShelfsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('ja_JP');
        // DB::table('shelfs')->truncate();

            DB::table('shelfs')->insert([
                [
                    'book_id' => 1,
                    'user_id' => 1,
                    'status' => $faker->numberBetween($min = 1, $max = 3),
                    'point' => $faker->numberBetween($min = 1, $max = 100),
                    'finished_amount' => 10,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'book_id' => 2,
                    'user_id' => 1,
                    'status' => $faker->numberBetween($min = 1, $max = 3),
                    'point' => $faker->numberBetween($min = 1, $max = 100),
                    'finished_amount' => 10,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'book_id' => 3,
                    'user_id' => 1,
                    'status' => $faker->numberBetween($min = 1, $max = 3),
                    'point' => $faker->numberBetween($min = 1, $max = 100),
                    'finished_amount' => 10,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'book_id' => 4,
                    'user_id' => 1,
                    'status' => $faker->numberBetween($min = 1, $max = 3),
                    'point' => $faker->numberBetween($min = 1, $max = 100),
                    'finished_amount' => 10,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'book_id' => 5,
                    'user_id' => 1,
                    'status' => $faker->numberBetween($min = 1, $max = 3),
                    'point' => $faker->numberBetween($min = 1, $max = 100),
                    'finished_amount' => 10,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'book_id' => 6,
                    'user_id' => 1,
                    'status' => $faker->numberBetween($min = 1, $max = 3),
                    'point' => $faker->numberBetween($min = 1, $max = 100),
                    'finished_amount' => 10,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'book_id' => 7,
                    'user_id' => 1,
                    'status' => $faker->numberBetween($min = 1, $max = 3),
                    'point' => $faker->numberBetween($min = 1, $max = 100),
                    'finished_amount' => 10,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'book_id' => 8,
                    'user_id' => 1,
                    'status' => $faker->numberBetween($min = 1, $max = 3),
                    'point' => $faker->numberBetween($min = 1, $max = 100),
                    'finished_amount' => 10,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'book_id' => 9,
                    'user_id' => 1,
                    'status' => $faker->numberBetween($min = 1, $max = 3),
                    'point' => $faker->numberBetween($min = 1, $max = 100),
                    'finished_amount' => 10,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'book_id' => 10,
                    'user_id' => 1,
                    'status' => $faker->numberBetween($min = 1, $max = 3),
                    'point' => $faker->numberBetween($min = 1, $max = 100),
                    'finished_amount' => 10,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
            ]);


        // for( $cnt = 1; $cnt <= 30; $cnt++ ) { 
        //     $faker = Faker\Factory::create('ja_JP');
        
        //     DB::table('shelfs')->insert([
        //     'book_id' => $faker->numberBetween($min = 1, $max = 30),
        //     'user_id' => $faker->numberBetween($min = 1, $max = 30),
        //     'status' => $faker->numberBetween($min = 1, $max = 3),
        //     'point' => $faker->numberBetween($min = 70, $max = 100),
        //     'finished_amount' => $faker->numberBetween($min = 1, $max = 100),
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now(),
        //     ]);
        // }
    }
}
