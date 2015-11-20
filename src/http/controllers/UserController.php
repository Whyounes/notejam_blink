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
        return app()->twig->render('user/signin.htm');
    }

    public function signup()
    {
        return app()->twig->render('user/signup.htm');
    }

    public function settings(Request $request)
    {
        return app()->twig->render('user/settings.htm');
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
            $request->session->add([
                'errors' => $validator->errors()->all(),
            ]);
            
            return app('twig')->render('user/signup.htm', [
                'oldInputs'     => $request->all()
            ]);
        }

        $user = new \App\Models\User;
        $user->email = $request->body->get('email');
        $user->password = $hash->make($request->body->get('password'));
        $user->save();
        
        $request->session->add(['success' => "Welcome to Notejam, you can now log in."]);

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
            $request->session->add([
                'errors' => $validator->errors()->all(),
            ]);

            return app('twig')->render('user/signin.htm', [
                'oldInputs'     => $request->all()
            ]);
        }

        $user = auth()->attempt($request->only(['email', 'password']));

        if ( !$user )
        {
            $request->session->add([
                'errors' => ['Login error.'],
            ]);

            return app('twig')->render('user/signin.htm', [
                'oldInputs'     => $request->all()
            ]);
        }
        
        $cookies = $response->getCookies()->add( new \blink\http\Cookie([
            'name' => 'SESSIONID', 
            'value' => $request->session->id
        ]) );

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
            $request->session->add([
                'errors' => $validator->errors()->all(),
            ]);

            return app('twig')->render('user/settings.htm', [
                'oldInputs'     => $request->all()
            ]);
        }

        if( !$hash->check($request->input('old_password'), $user->password) )
        {
            $request->session->add([
                'errors' => ['Old password incorrect.'],
            ]);

            return app('twig')->render('user/settings.htm', [
                'oldInputs'     => $request->all()
            ]);
        }

        $user->password = $hash->make($request->input('old_password'));
        $user->save();

        $request->session->add([
                'success' => 'settings updated successfuly.',
        ]);

        return app('twig')->render('user/settings.htm');
    }

    public function logout(Request $request, Response $response)
    {
        auth()->logout($request->session->id);

        return $response->redirect('/signin');
    }
}
