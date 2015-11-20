<?php 
namespace App\Http\Controllers;

use blink\core\Object;
use blink\http\Request;
use blink\http\Response;
use Illuminate\Validation\Factory as Validator;
use \App\Models\Note;
use \App\Models\Pad;

class NoteController extends Object
{

    protected function noteExists( $noteId )
    {
        $request = request();
        $note = Note::with('pad')
                    ->where('user_id', $request->user()->id)
                    ->where('id', $noteId)
                    ->first();
        if( !$note )
        {
            $request->session->add([
                'errors' => ["Note not found."],
            ]);

            return false;
        }

        return $note;
    }

    public function show($id, Request $request, Response $response, Note $noteModel)
    {
        $note = $this->noteExists($id);

        if( !$note )
        {
            return $response->redirect('/notes');
        }

        return app()->twig->render('notes/view.htm', [
            'note' => $note
        ]);
    }

    public function edit($id, Request $request, Note $noteModel, Pad $padModel)
    {
        $note = $this->noteExists($id);
        if( !$note )
        {
            return $response->redirect('/notes');
        }

        $pads = $padModel->where('user_id', $request->user()->id)->get();

        return app()->twig->render('notes/edit.htm', [
            'note'  => $note,
            'pads'  => $pads
        ]);
    }

    public function create(Request $request, Pad $padModel)
    {
        $pads = $padModel->where('user_id', $request->user()->id)->get();

        return app('twig')->render('notes/create.htm', [
            'pads' => $pads
        ]);
    }

    public function index(Request $request, Note $noteModel)
    {
        $notes = $noteModel
                    ->where('user_id', $request->user()->id)
                    ->with('pad')
                    ->get();

        return app('twig')->render('notes/index.htm', [
            'notes' => $notes
        ]);
    }

    public function update($id, Request $request, Note $noteModel, Pad $padModel)
    {
        $note = $this->noteExists($id);
        if( !$note )
        {
            return $response->redirect('/notes');
        }

        $pads = $padModel->where('user_id', $request->user()->id)->get();

        $rules = [
            'name'  => 'required',
            'text'  => 'required',
            'pad'   => 'required|exists:pads,id'
        ];
        $validator = app('validation')->make($request->all(), $rules);
        
        if ( $validator->fails() )
        {
            $request->session->add([
                'errors' => $validator->errors()->all(),
            ]);
            
            return app('twig')->render('notes/edit.htm', [
                'note'      => $note,
                'pads'      => $pads
            ]);
        }

        $note->name = $request->input('name');
        $note->text = $request->input('text');
        $note->pad_id = $request->input('pad');
        $note->save();

        $request->session->add([
            'success' => 'Note updated successfuly.'
        ]);

        return app('twig')->render('notes/edit.htm', [
            'note'      => $note,
            'pads'      => $pads
        ]);
    }

    public function store(Request $request, Response $response)
    {
        $rules = [
            'name'  => 'required',
            'text'  => 'required',
            'pad'   => 'required|exists:pads,id'
        ];
        $validator = app('validation')->make($request->all(), $rules);
        
        if ( $validator->fails() )
        {
            $request->session->add([
                'errors' => $validator->errors()->all(),
            ]);
            
            return app('twig')->render('notes/create.htm', [
                'oldInputs' => $request->all()
            ]);
        }

        $note = new Note;
        $note->name = $request->input('name');
        $note->text = $request->input('text');
        $note->user_id = $request->user()->id;
        $note->pad_id = $request->input('pad');
        $note->save();

        $request->session->add([
            'success' => 'Note saved successfuly.',
        ]);

        return $response->redirect("/notes/{$note->id}/update");
    }

    public function delete($id, Request $request, Response $response, Note $noteModel)
    {
        $note = $this->noteExists($id);
        if( !$note )
        {
            return $response->redirect('/notes');
        }

        $note->delete();

        $request->session->add([
            'success' => 'Note deleted successfuly.',
        ]);

        return $response->redirect('/notes');
    }
}