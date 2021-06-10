<?php


namespace App\Core\Admin;


use App\Mail\SignUpInvitationMail;
use App\Models\Invitation;
use Illuminate\Support\Facades\Mail;

class InviteUser
{
    public function __invoke($email)
    {
       $invitation =  Invitation::create([
            'email' => $email,
            'token' => substr(md5(rand(0, 9) . $email . now()), 0, 32),
            'registered_at' => null,
            'expires_at' => now()->addMinutes(30)
       ]);

        Mail::to($email)->send(
            new SignUpInvitationMail($invitation->link)
        );
       return $invitation;
    }
}
