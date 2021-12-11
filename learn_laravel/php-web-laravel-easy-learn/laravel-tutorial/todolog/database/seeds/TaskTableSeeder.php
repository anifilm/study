<?php

use Illuminate\Database\Seeder;

class TaskTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $array = [
            '개인' => '개인적으로 할 일',
            '작업' => '업무 목록',
            '심부름' => '심부름',
            '쇼핑' => '사야할 것들',
        ];

        $users = App\User::all();

        foreach ($users as $u) {
            foreach ($array as $name => $desc) {
                $proj = factory(App\Project::class, 1)
                    ->create([
                        'name' => $name,
                        'description' => $desc,
                        'user_id' => $u->id,
                    ]);

                foreach (factory(App\Task::class, 10)->make() as $task) {
                    $proj->tasks()->save($task);
                }
            }
        }
    }
}
