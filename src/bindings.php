<?php

/*
    Registering Twig
 */

$app->bind('twig.loader', function () {
    $view_paths = __DIR__.'/views';
    $loader = new \Twig_Loader_Filesystem($view_paths);

    return $loader;
});

$app->bind('twig', function () use($app) {
    $options = [
        'debug' => false,
        'cache' => __DIR__.'/views/compiled'
    ];

    $twig = new \Twig_Environment($app->get('twig.loader'), $options);

    // register Twig Extensions
    $twig->addExtension(new \Twig_Extension_Debug());

    // register Twig globals
    $twig->addGlobal('app', $app);

    return $twig;
});

/*
    Registering Eloquent DB Manager
 */

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;
$capsule->addConnection(require __DIR__.'/config/database.php');

$app->bind('capsule', $capsule);
$capsule->setAsGlobal();
$capsule->bootEloquent();

/*
    Registering Validator
 */

use Illuminate\Container\Container;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Translation\FileLoader;
use Illuminate\Translation\Translator;
use Illuminate\Validation\Factory;
use Illuminate\Validation\DatabasePresenceVerifier;

$loader = new FileLoader(new Filesystem, __DIR__.'/lang');
$translator = new Translator($loader, 'en');
$validation = new Factory($translator, new Container);
$validation->setPresenceVerifier(new DatabasePresenceVerifier(app('capsule')->getDatabaseManager()));
$app->bind('validation', $validation);
