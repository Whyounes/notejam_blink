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
            '/settings',
            '/logout',
            '/notes'
        ];
        
        if(in_array($request->path, $guardedRoutes) && !$request->user())
        {
            return response()->redirect('/signin');
        }
    }
}