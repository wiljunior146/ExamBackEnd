<?php

namespace App\Services;

class PhotoService
{
    /**
     * Get Photos
     *
     * @param array|null $data
     * @return array
     */
    public function index(array $data = null)
    {
        $photos = app('Photo')
          ->when(isset($data['album_id']), function ($q) use ($data) {
            $q->where('album_id', $data['album_id']);
          })
          ->latest();

        return isset($data['page']) ? $photos->paginate($data['limit'] ?? 10) : $photos->get();
    }
}
