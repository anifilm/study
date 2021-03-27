<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        //DB::table('users')->insert([
        //    'name' => Str::random(3).' '.Str::random(4),
        //    'email' => Str::random(10).'@example.com',
        //    'password' => bcrypt('1111'),
        //]);
        User::factory()->count(5)->create();
    }
}
