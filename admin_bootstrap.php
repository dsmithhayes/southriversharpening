<?php

require_once 'vendor/autoload.php';
$app = require_once 'bootstrap.php';

use Psr\Message\Http\ServerRequestInterface as Request;
use Psr\Message\Http\ResponseInterface as Response;

/**
 * Break out the application container
 */
$container = $app->getContainer();

/**
 * Add the session middleware
 */
$app->add(function (Request $req, Response $res, callabe $next) {
    // check for the active session and authentication


    // build out the next response
    $res = $next($req, $res);

    // return it to the client
    return $res;
});

/**
 * Load the models
 */

return $app;
