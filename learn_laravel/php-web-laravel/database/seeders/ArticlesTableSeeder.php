<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Article;
use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $users = User::all();

        $users->each(function ($user) {
           $user->articles()->save(
               Article::factory()->make()
           );
        });
    }
}
