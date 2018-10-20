<?php

namespace App\Http\Middleware;

use Illuminate\Http\Response;
use Illuminate\Http\Request;

use Closure;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        /* Looks like it's not possible to use validation in middleware */

        if($request->input('key') === (string)env('WORDKIT_KEY', false)){
            return $next($request);
        } else {
            return response()->json(['error' => true]);
        }
    }

}