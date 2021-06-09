<?php

namespace App\Http\Controllers\Api;

use App\Core\CreateUser;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends ApiController
{
    /**
     * Create new user
    */
    public function store(Request $request, $token)
    {
        $rules = [
            'name' => 'required|min:4|max:20',
            'password' => 'required',
        ];
        $response = $this->validateApiRequest($rules);
        if ($response !== true) {
            return $response;
        }
        $created = (new CreateUser())($request, $token);
        if ($created){
            return $this->successResponse($created);
        }
       return $this->failResponse();
    }
}
