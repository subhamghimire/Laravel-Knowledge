<?php


namespace App\Core\User;


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
