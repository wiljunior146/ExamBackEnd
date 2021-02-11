<?php

use Illuminate\Database\Seeder;

class PhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = file_get_contents('https://jsonplaceholder.typicode.com/photos');
        $photos = json_decode($json, true);
        $now = now();

        $photos = array_map(function ($x) use ($now) {
            return [
                'album_id' => $x['albumId'],
                'id' => $x['id'],
                'title' => $x['title'],
                'url' => $x['url'],
                'thumbnail_url' => $x['thumbnailUrl'],
                'created_at' => $now,
                'updated_at' => $now
            ];
        }, $photos);

        app('Photo')->insert($photos);
    }
}
