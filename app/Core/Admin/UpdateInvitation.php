<?php


namespace App\Core\Admin;


use App\Mail\SendCodeMail;
use Illuminate\Support\Facades\Mail;

class UpdateInvitation
{
    /**
     * @param $invitation
     * Send 6 digit code and update invitation
    */
    public function __invoke($invitation): bool
    {
        try {
            $code = random_int(100000, 999999);
            $invitation->update(['registered_at' => now(), 'code' => $code, 'expires_at' => now()->addMinutes(30)]);
            Mail::to($invitation->email)->send(
                new SendCodeMail($code)
            );
            return true;
        }catch (\Throwable $throwable)
        {
            return false;
        }
    }
}
