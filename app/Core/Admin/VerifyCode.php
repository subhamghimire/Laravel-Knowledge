<?php


namespace App\Core\Admin;


use App\Models\Invitation;

class VerifyCode
{
    /**
     * Return true if find 6 digit code
    */
    public function __invoke($code): bool
    {
        $invitation = Invitation::findOrFail($code);
        if ($invitation) {
            return true;
        }
        return false;
    }
}
