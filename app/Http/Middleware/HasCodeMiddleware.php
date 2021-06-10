<?php

namespace App\Http\Middleware;

use App\Models\Invitation;
use Closure;
use Illuminate\Http\Request;

class HasCodeMiddleware
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
        if (!$request->has('code')) {
            return response()->json(['message'=>'Code doesnot exists']);
        }
        $code = $request->get('code');
        $invitation = Invitation::where('code',$code)->where('email',$request->get('email'))->where('expires_at','>',now())->first();
        if (!$invitation)
        {
            return response()->json(['message'=>'Link doesnot exists!']);
        }
        return $next($request);
    }
}
