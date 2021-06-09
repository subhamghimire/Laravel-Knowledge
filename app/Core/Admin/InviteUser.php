<?php


namespace App\Core\Admin;


use App\Models\Invitation;

class InviteUser
{
    public function __invoke($email)
    {
       return Invitation::create([
            'email' => $email,
            'token' => substr(md5(rand(0, 9) . $email . now()), 0, 32),
            'registered_at' => now()
        ]);
    }
}
