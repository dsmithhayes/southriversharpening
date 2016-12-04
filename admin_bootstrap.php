<?php

require_once 'vendor/autoload.php';
$app = require_once 'bootstrap.php';

/**
 * Break out the application container
 */
$container = $app->getContainer();

/**
 * Add the session middleware
 */
$app->add(function ($req, $res, $next) {
    // check for the active session and authentication
    

    // build out the next response
    $res = $next($req, $res);

    // return it to the client
    return $res;
});

/**
 * Connect to the database
 */



/**
 * Load the models
 */

return $app;
