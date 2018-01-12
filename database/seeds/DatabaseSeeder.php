<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Schema::disableForeignKeyConstraints();
    	\App\Post::truncate();
    	\App\User::truncate();
        // factory(\App\User::class, 100)->create()->each(function ($user) {
        // 	factory(\App\Post::class, 100)->create(['user_id'=>$user->id]);
        // });
        $this->call(UsersTableSeeder::class);
        Schema::enableForeignKeyConstraints();

    }
}
