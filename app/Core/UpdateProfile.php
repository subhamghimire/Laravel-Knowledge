<?php


namespace App\Core;


class UpdateProfile
{
    /**
     * Update user and return
     * */
    public function __invoke($user, $data)
    {
        return $user->update($data);
    }
}
