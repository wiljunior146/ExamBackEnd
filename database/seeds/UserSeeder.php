<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = file_get_contents('https://jsonplaceholder.typicode.com/users');
        $users = json_decode($json, true);
        $now = now();
        $password = bcrypt('password');

        $users = array_map(function ($x) use ($now, $password) {
            $x['created_at'] = $now;
            $x['updated_at'] = $now;
            $x['password'] = $password;
            $x['address'] = json_encode($x['address']);
            $x['company'] = json_encode($x['company']);
            return $x;
        }, $users);

        app('User')->insert($users);
    }
}
