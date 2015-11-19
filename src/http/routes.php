<?php
return [
    ['GET', '/signin', '\\App\\Http\\Controllers\\UserController@signin'],
    ['POST', '/signin', '\\App\\Http\\Controllers\\UserController@processSignin'],

    ['GET', '/signup', '\\App\\Http\\Controllers\\UserController@signup'],
    ['POST', '/signup', '\\App\\Http\\Controllers\\UserController@store'],

    ['GET', '/logout', '\\App\\Http\\Controllers\\UserController@logout'],

    ['GET', '/settings', '\\App\\Http\\Controllers\\UserController@settings'],
    ['POST', '/settings', '\\App\\Http\\Controllers\\UserController@updateSettings'],
];
