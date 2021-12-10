<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => '테스터',
                'email' => 'test@test.com',
                'password' => bcrypt('test1234'),
            ],
            [
                'name' => '테스터2',
                'email' => 'test2@test.com',
                'password' => bcrypt('test1234'),
            ],
        ];

        foreach($users as $u) {
            App\User::create($u);
        }
    }
}
