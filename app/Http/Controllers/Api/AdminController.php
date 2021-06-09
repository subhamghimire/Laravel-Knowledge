<?php


namespace App\Http\Controllers\Api;

use App\Core\Admin\InviteUser;
use Illuminate\Http\Request;

class AdminController extends ApiController
{
    /**
     * This method is used for inviting users.
    */
    public function invite(Request $request)
    {
        $rules = [
            'email' => 'required|email|unique:invitations,email'
        ];
        $response = $this->validateApiRequest($rules);
        if ($response !== true) {
            return $response;
        }
        $email = $request['email'];
        $invited = (new InviteUser())($email);
        if ($invited){
            return $this->successResponse($invited);
        }
        return $this->failResponse();
    }
}
