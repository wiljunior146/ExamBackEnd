<?php

namespace App\Services;

class UserService
{
    /**
     * Get Users
     *
     * @param array $data
     * @return array
     */
    public function index(array $data = null)
    {
        $users = app('User')->latest();

        return isset($data['page']) ? $users->paginate($data['limit'] ?? 10) : $users->get();
    }
}
