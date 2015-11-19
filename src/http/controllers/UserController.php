<?php 
namespace App\Http\Controllers;

use blink\core\Object;
use blink\http\Request;
use blink\http\Response;
use Illuminate\Validation\Factory as Validator;
use Illuminate\Hashing\BcryptHasher as Hash;

class UserController extends Object
{
    public function signin()
    {
        return app()->twig->render('user/signin.htm', [
            'session'       => session()
        ]);
    }

    public function signup()
    {
        return app()->twig->render('user/signup.htm', [
            'session'       => session()
        ]);
    }

    public function settings(Request $request)
    {
        return app()->twig->render('user/settings.htm', [
            'session'       => session()
        ]);
    }

    public function store(Request $request, Response $response, Hash $hash)
    {
        $rules = [
            'email'     => 'required|email|unique:users',
            'password'  => 'required|confirmed|min:8'
        ];

        $validator = app('validation')->make($request->all(), $rules);
        if ( $validator->fails() )
        {
            $session = session()->put([
                'errors' => $validator->errors()->all(),
            ]);
            
            return app('twig')->render('user/signup.htm', [
                'session'       => $session,
                'oldInputs'     => $request->all()
            ]);
        }

        $user = new \App\Models\User;
        $user->email = $request->body->get('email');
        $user->password = $hash->make($request->body->get('password'));
        $user->save();
        
        $session = session()->put(['success' => "Welcome to Notejam, you can now log in."]);

        return $response->redirect('/signin');
    }

    public function processSignin(Request $request, Response $response, Hash $hash)
    {
        $rules = [
            'email'     => 'required|email',
            'password'  => 'required|min:8'
        ];
        $validator = app('validation')->make($request->all(), $rules);
        if ( $validator->fails() )
        {
            $session = session()->put([
                'errors' => $validator->errors()->all(),
            ]);

            return app('twig')->render('user/signin.htm', [
                'session'       => $session,
                'oldInputs'     => $request->all()
            ]);
        }

        $user = auth()->attempt($request->only(['email', 'password']));

        if ( !$user )
        {
            $session = session()->put([
                'errors' => ['Login error.'],
            ]);

            return app('twig')->render('user/signin.htm', [
                'session'       => $session,
                'oldInputs'     => $request->all()
            ]);
        }
        $cookies = $request->getCookies();
        $cookies->add( new \blink\http\Cookie([
            'name' => 'SESSIONID', 
            'value' => $request->getSession()->id
        ]) );
        
        $request->setCookies($cookies);

        return $response->redirect('/settings');
    }

    public function updateSettings(Request $request, Hash $hash)
    {
        $user = $request->user();
        $rules = [
            'old_password'   => 'required|min:8',
            'password'      => 'required|confirmed|min:8'
        ];

        $validator = app('validation')->make($request->all(), $rules);
        if ( $validator->fails() )
        {
            $session = session()->put([
                'errors' => $validator->errors()->all(),
            ]);

            return app('twig')->render('user/settings.htm', [
                'session'       => $session,
                'oldInputs'     => $request->all()
            ]);
        }

        if( !$hash->check($request->input('old_password'), $user->password) )
        {
            $session = session()->put([
                'errors' => ['Old password incorrect.'],
            ]);

            return app('twig')->render('user/settings.htm', [
                'session'       => $session,
                'oldInputs'     => $request->all()
            ]);
        }

        $user->password = $hash->make($request->input('old_password'));
        $user->save();

        $session = session()->put([
                'success' => 'settings updated successfuly.',
        ]);

        return app('twig')->render('user/settings.htm', [
            'session'       => $session
        ]);
    }

    public function logout(Request $request, Response $response)
    {
        $session = $request->getSession();
        auth()->logout($session->id);

        return $response->redirect('/signin');
    }
}
