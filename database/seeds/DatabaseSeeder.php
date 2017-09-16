<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
         Model::unguard();
        $this->call('MovieTableSeeder');
    }
}

class MovieTableSeeder extends Seeder
{
    public function run()
    {
        App\Movie::truncate();
        factory(App\Movie::class, 20)->create();
    }
}