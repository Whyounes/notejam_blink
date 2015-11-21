<?php 
namespace app\http\controllers;

use blink\core\Object;
use blink\http\Request;
use blink\http\Response;
use Illuminate\Validation\Factory as Validator;
use app\models\Pad;

class PadController extends Object
{

    protected function padExists($padId)
    {
        $request = request();
        $pad = Pad::with('notes')
                    ->where('user_id', $request->user()->id)
                    ->where('id', $padId)
                    ->first();

        if( !$pad )
        {
            $request->session->add([
                'errors'    => ["Pad not found."]
            ]);

            return false;
        }

        return $pad;
    }

    public function show($id, Request $request, Response $response, Pad $padModel)
    {
        $pad = $this->padExists($id);
        if( !$pad )
        {
            return $response->redirect('/pads');
        }

        return app()->twig->render('pads/view.htm', [
            'pad' => $pad
        ]);
    }

    public function edit($id, Pad $padModel)
    {
        $pad = $this->padExists($id);
        if( !$pad )
        {
            return $response->redirect('/pads');
        }

        return app()->twig->render('pads/edit.htm', [
            'pad' => $pad
        ]);
    }

    public function create()
    {
        return app('twig')->render('pads/create.htm');
    }

    public function index(Request $request, Pad $padModel)
    {
        $pads = $padModel->where('user_id', $request->user()->id)->get();

        return app('twig')->render('pads/index.htm', [
            'pads' => $pads
        ]);
    }

    public function update($id, Request $request, Pad $padModel)
    {
        $pad = $this->padExists($id);
        if( !$pad )
        {
            return $response->redirect('/pads');
        }

        $rules = [
            'name'     => 'required'
        ];

        $validator = app('validation')->make($request->all(), $rules);
        if ( $validator->fails() )
        {
            $request->session->add([
                'errors' => $validator->errors()->all(),
            ]);
            
            return app('twig')->render('pads/edit.htm', [
                'pad'       => $pad
            ]);
        }

        $pad->name = $request->input('name');
        $pad->save();

        $request->session->add([
                'success' => 'Pad updated successfuly.',
        ]);

        return app('twig')->render('pads/edit.htm', [
            'pad'       => $pad
        ]);
    }

    public function store(Request $request, Response $response)
    {
        $rules = [
            'name' => 'required'
        ];
        $validator = app('validation')->make($request->all(), $rules);
        if ( $validator->fails() )
        {
            $request->session->add([
                'errors' => $validator->errors()->all(),
            ]);
            
            return app('twig')->render('pads/create.htm');
        }

        $pad = new Pad;
        $pad->name = $request->input('name');
        $pad->user_id = $request->user()->id;
        $pad->save();

        $request->session->add([
                'success' => 'Pad saved successfuly.',
        ]);

        return $response->redirect("/pads/{$pad->id}/update");
    }

    public function delete($id, Request $request, Pad $padModel)
    {
        $pad = $this->padExists($id);
        if( !$pad )
        {
            return $response->redirect('/pads');
        }

        $pad->delete();

        $request->session->add([
                'success' => 'Pad deleted successfuly.',
        ]);

        return app('twig')->render('pads/index.htm', [
            'pads'       => $padModel->all()
        ]);
    }
}
