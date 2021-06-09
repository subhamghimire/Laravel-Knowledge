<?php


namespace App\Core\User;


use App\Models\User;

class CreateUser
{
    /**
     * @param $data
     * @param $token
     * Creat a user and return user instance
    */
    public function __invoke($data, $token)
    {
        $data['user_name'] = 'user';
        $data['avatar'] = 'avatar/avatar.jpg';
        $data['registered_at'] = now();
        $data['api_token'] = $token;
       return User::create($data);
    }

}
