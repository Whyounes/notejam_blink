<?php 
namespace App\Http\Controllers;

use blink\core\Object;
use blink\http\Request;
use blink\http\Response;
use Illuminate\Validation\Factory as Validator;
use \App\Models\Pad;

class PadController extends Object
{

    public function show($id, Pad $padModel)
    {
        $pad = $padModel->with('notes')->findOrFail($id); // test with a validation

        return app()->twig->render('pads/view.htm', [
            'pad' => $pad
        ]);
    }

    public function edit($id, Pad $padModel)
    {
        $pad = $padModel->findOrFail($id); // test with a validation

        return app()->twig->render('pads/edit.htm', [
            'pad' => $pad
        ]);
    }

    public function update($id, Request $request, Pad $padModel)
    {
        $pad = $padModel->findOrFail($id); // test with a validation
        $rules = [
            'name'     => 'required'
        ];

        $validator = app('validation')->make($request->all(), $rules);
        if ( $validator->fails() )
        {
            $session = session()->put([
                'errors' => $validator->errors()->all(),
            ]);
            
            return app('twig')->render('pads/edit.htm', [
                'session'   => $session,
                'pad'       => $pad
            ]);
        }

        $pad->name = $request->input('name');
        $pad->save();

        $session = session()->put([
                'success' => 'Pad updated successfuly.',
        ]);

        return app('twig')->render('pads/edit.htm', [
            'session'   => $session,
            'pad'       => $pad
        ]);
    }


    public function delete($id, Request $request, Pad $padModel)
    {
        $pad = $padModel->findOrFail($id);
        $user = $request->user();

        if( $pad->user->id !== $user->id )
        {
            $session = session()->put([
                'errors' => ["You are not the owner of this pad."],
            ]);
            
            return app('twig')->render('pads/edit.htm', [
                'session'   => $session,
                'pad'       => $pad
            ]);
        }

        $pad->delete();

        $session = session()->put([
                'success' => 'Pad deleted successfuly.',
        ]);

        return app('twig')->render('pads/index.htm', [
            'session'   => $session,
            'pads'       => $padModel->all()
        ]);
    }
}