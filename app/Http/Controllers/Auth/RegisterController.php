<?php


namespace App\Http\Controllers\Auth;


use App\Core\Admin\UpdateInvitation;
use App\Core\Admin\VerifyCode;
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
        try {
            $rules = [
                'name' => 'required|min:4|max:20',
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
        }catch (\Throwable $throwable) {
            return $this->failResponse();
        }
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

    public function confirmCode(Request $request): \Illuminate\Http\JsonResponse
    {
        $code = $request['code'];
        $verified = (new VerifyCode())($code);
        if ($verified){
            return $this->successResponse();
        }
        return $this->failResponse();
    }
}
