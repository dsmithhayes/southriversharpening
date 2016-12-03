<?php

require_once 'vendor/autoload.php';
$app = require_once 'bootstrap.php';



/**
 * Break out the application container
 */
$container = $app->getContainer();

/**
 * Append the middleware for handling sessions
 */
$app->add(function (Request $req, Response $res, callable $next) {

    return $res;
});


return $app;
