<?php

use Illuminate\Database\Seeder;

class AlbumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = file_get_contents('https://jsonplaceholder.typicode.com/albums');
        $albums = json_decode($json, true);
        $now = now();

        $albums = array_map(function ($x) use ($now) {
            return [
                'user_id' => $x['userId'],
                'id' => $x['id'],
                'title' => $x['title'],
                'created_at' => $now,
                'updated_at' => $now
            ];
        }, $albums);

        app('Album')->insert($albums);
    }
}
