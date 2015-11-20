<?php
return [
    ['GET', '/', function(blink\http\Response $response){
        return $response->redirect('/signin');
    }],
    // authtication
    ['GET', '/signin', '\\App\\Http\\Controllers\\UserController@signin'],
    ['POST', '/signin', '\\App\\Http\\Controllers\\UserController@processSignin'],

    ['GET', '/signup', '\\App\\Http\\Controllers\\UserController@signup'],
    ['POST', '/signup', '\\App\\Http\\Controllers\\UserController@store'],

    ['GET', '/logout', '\\App\\Http\\Controllers\\UserController@logout'],

    ['GET', '/settings', '\\App\\Http\\Controllers\\UserController@settings'],
    ['POST', '/settings', '\\App\\Http\\Controllers\\UserController@updateSettings'],

    //pads
    ['GET', '/pads', '\\App\\Http\\Controllers\\PadController@index'],
    ['GET', '/pads/{id:\d+}', '\\App\\Http\\Controllers\\PadController@show'],

    ['GET', '/pads/create', '\\App\\Http\\Controllers\\PadController@create'],
    ['POST', '/pads/create', '\\App\\Http\\Controllers\\PadController@store'],

    ['GET', '/pads/{id:\d+}/update', '\\App\\Http\\Controllers\\PadController@edit'],
    ['POST', '/pads/{id:\d+}/update', '\\App\\Http\\Controllers\\PadController@update'],

    ['GET', '/pads/{id:\d+}/delete', '\\App\\Http\\Controllers\\PadController@delete'],

    // Notes
    ['GET', '/notes', '\\App\\Http\\Controllers\\NoteController@index'],
    ['GET', '/notes/{id:\d+}', '\\App\\Http\\Controllers\\NoteController@show'],

    ['GET', '/notes/create', '\\App\\Http\\Controllers\\NoteController@create'],
    ['POST', '/notes/create', '\\App\\Http\\Controllers\\NoteController@store'],

    ['GET', '/notes/{id:\d+}/update', '\\App\\Http\\Controllers\\NoteController@edit'],
    ['POST', '/notes/{id:\d+}/update', '\\App\\Http\\Controllers\\NoteController@update'],

    ['GET', '/notes/{id:\d+}/delete', '\\App\\Http\\Controllers\\NoteController@delete'],
];
