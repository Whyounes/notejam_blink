<?php
namespace App\Http\Middleware;

use blink\core\MiddlewareContract;
use blink\http\Request;
use blink\http\Response;

class AuthMiddleWare implements MiddlewareContract
{
    public function handle($request)
    {
        $guardedRoutes = [
            '/\/settings/',
            '/\/logout/',
            '/\/notes?\/*.*/',
            '/\/pads?\/*.*/',
        ];

        if ( !$request->user() )
        {
            foreach ($guardedRoutes as $route)
            {
                if ( $request->match($route) )
                {
                    return response()->redirect('/signin');
                }
            }
        }

        if ( $request->user() && in_array($request->path, ['/signin', '/signup']))
        {
            return response()->redirect('/settings');
        }
    }
}