<?php


namespace App\Core\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateUser
{
    /**
     * @param $data
     * Creat a user and return user instance
    */
    public function __invoke($data)
    {
        $data['user_name'] = 'user';
        $data['password'] = Hash::make($data['password']);
        $data['avatar'] = 'avatar/avatar.jpg';
        $data['registered_at'] = now();
        $data['user_role'] = User::IS_USER;
        $user = User::create($data);
        $user->createToken('Personal Access Token');
        return $user;
    }

}
