<?php


namespace App\Core\User;


use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class UpdateProfile
{
    /**
     * Update user and return
     * */
    public function __invoke($data, $user)
    {
        $data['user_role'] = User::IS_USER;
        $data['password'] = Hash::make($data['password']);
        $filename = uniqid('avatar_', true) . '.jpg';
        $image = Image::make($data['avatar'])->stream('jpg');
        Storage::disk('public')->put('/avatar/'.$filename, $image);
        $data['avatar'] = 'avatar/'.$filename;
        return $user->update($data);
    }
}
