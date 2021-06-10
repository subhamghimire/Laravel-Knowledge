<?php

namespace App\Http\Controllers\Api;

use App\Core\User\CreateUser;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends ApiController
{
    /**
     * Update profile of a user
    */
    public function update(Request $request, $user)
    {
        $rules = [
            'name' => 'required|min:4|max:20',
            'email' => 'required',
            'password' => 'required',
            'avatar' => 'dimensions:min_width=256,min_height=256'
        ];
        $response = $this->validateApiRequest($rules);
        if ($response !== true) {
            return $response;
        }

    }
}
