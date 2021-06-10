<?php


namespace App\Http\Controllers\Auth;


use App\Core\Admin\UpdateInvitation;
use App\Core\User\CreateUser;
use App\Http\Controllers\Api\ApiController;
use App\Models\Invitation;
use Illuminate\Http\Request;

class RegisterController extends ApiController
{
    /**
     * Register a new user from signup link
    */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|min:4|max:20',
            'email' => 'required|unique:users,email',
            'password' => 'required',
        ];
        $response = $this->validateApiRequest($rules);
        if ($response !== true) {
            return $response;
        }
        $created = (new CreateUser())($request->all());
        if ($created){
            return $this->successResponse($created);
        }
        return $this->failResponse();
    }

    /**
     * Follows link and update invitation
     * */
    public function confirm(Request $request): \Illuminate\Http\JsonResponse
    {
        $invitation = Invitation::where('token', $request['token'])->firstOrFail();
        $updated = (new UpdateInvitation())($invitation);
        if ($updated){
            return $this->successResponse();
        }
        return $this->failResponse();
    }

}
