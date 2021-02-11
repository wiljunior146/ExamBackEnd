<?php

namespace App\Services;

class AlbumService
{
    /**
     * Get Albums
     *
     * @param array|null $data
     * @return array
     */
    public function index(array $data = null)
    {
        $albums = app('Album')
        ->when(isset($data['user_id']), function ($q) use ($data) {
          $q->where('user_id', $data['user_id']);
        })
        ->latest();

        return isset($data['page']) ? $albums->paginate($data['limit'] ?? 10) : $albums->get();
    }
}
