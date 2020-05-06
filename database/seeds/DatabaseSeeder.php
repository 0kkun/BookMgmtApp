<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        // factory(App\User::class, 20)->create();

        $this->call(BooksTableSeeder::class);

        // $this->call(ShelfsTableSeeder::class);



    }
}
