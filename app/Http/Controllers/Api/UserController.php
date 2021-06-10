<?php

namespace App\Http\Controllers\Api;

use App\Core\User\CreateUser;
use App\Core\User\UpdateProfile;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends ApiController
{
    /**
     * Update profile of a user
    */
    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required|min:4|max:20',
            'email' => 'required',
            'password' => 'required',
            'avatar' => 'required|image|dimensions:width=256,height=256',
            'user_name' => 'required',
        ];
        $response = $this->validateApiRequest($rules);
        if ($response !== true) {
            return $response;
        }
        $user = User::find($id);
        $updated = (new UpdateProfile())($request->all(), $user);
        if ($updated){
            return $this->successResponse($updated);
        }
        return $this->failResponse();
    }
}
