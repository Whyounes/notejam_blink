<?php
return [
    ['GET', '/', function(blink\http\Response $response){
        return $response->redirect('/signin');
    }],

    // authentication
    ['GET', '/signin', 'UserController@signin'],
    ['POST', '/signin', 'UserController@processSignin'],

    ['GET', '/signup', 'UserController@signup'],
    ['POST', '/signup', 'UserController@store'],

    ['GET', '/logout', 'UserController@logout'],

    ['GET', '/settings', 'UserController@settings'],
    ['POST', '/settings', 'UserController@updateSettings'],

    //pads
    ['GET', '/pads', 'PadController@index'],
    ['GET', '/pads/{id:\d+}', 'PadController@show'],

    ['GET', '/pads/create', 'PadController@create'],
    ['POST', '/pads/create', 'PadController@store'],

    ['GET', '/pads/{id:\d+}/update', 'PadController@edit'],
    ['POST', '/pads/{id:\d+}/update', 'PadController@update'],

    ['GET', '/pads/{id:\d+}/delete', 'PadController@delete'],

    // Notes
    ['GET', '/notes', 'NoteController@index'],
    ['GET', '/notes/{id:\d+}', 'NoteController@show'],

    ['GET', '/notes/create', 'NoteController@create'],
    ['POST', '/notes/create', 'NoteController@store'],

    ['GET', '/notes/{id:\d+}/update', 'NoteController@edit'],
    ['POST', '/notes/{id:\d+}/update', 'NoteController@update'],

    ['GET', '/notes/{id:\d+}/delete', 'NoteController@delete'],
];
