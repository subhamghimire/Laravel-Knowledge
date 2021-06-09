<?php

namespace App\Http\Controllers\Api;

use App\Core\CreateUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;

class UserController extends ApiController
{
    /**
     * Create new user
    */
    public function store(UserRequest $request, $token)
    {
        $data = $this->validateApiRequest($request);
        try{
            $user = (new CreateUser())($data, $token);
            return $this->successResponse($user);
        }catch(\Throwable $exception){
            return $this->failResponse();
        }
    }
}
