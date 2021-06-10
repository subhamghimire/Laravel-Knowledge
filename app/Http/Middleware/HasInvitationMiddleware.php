<?php

namespace App\Http\Middleware;

use App\Models\Invitation;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;

class HasInvitationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!$request->has('token')) {
            return response()->json(['message'=>'Token doesnot exists']);
        }
        $token = $request->get('token');
        try {
            $invitation = Invitation::where('token', $token)->where('expires_at','>',now())->firstOrFail();
        } catch (\Throwable $e) {
            return response()->json(['message'=>'Invitaion link expired']);
        }
        if (!is_null($invitation->registered_at)) {
            return response()->json(['message'=>'Link has already been used']);
        }
        return $next($request);
    }
}
