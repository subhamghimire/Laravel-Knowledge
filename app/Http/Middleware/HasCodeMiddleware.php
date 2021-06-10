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
        $confirmationCode = Invitation::find($code)->where('expires_at','>',now());
        if (!$confirmationCode)
        {
            return response()->json(['message'=>'Please Confirm code and continue']);
        }
        return $next($request);
    }
}
