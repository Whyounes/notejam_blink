<?php

defined('BLINK_ENV') or define('BLINK_ENV', getenv('BLINK_ENV') ?: 'dev');

/**
 * Basic application configurations.
 */
$config = require __DIR__ . '/config/app.php';

/**
 * Loading routes definitions.
 */
$config['routes'] = require __DIR__ . '/http/routes.php';

/**
 * Loading application service definitions.
 */

$config['services'] = require __DIR__ . '/config/services.php';


$app = new blink\core\Application($config);

require __DIR__.'/bindings.php';

return $app;
