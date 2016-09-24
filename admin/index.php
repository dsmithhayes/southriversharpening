<?php

$app = require_once '../bootstrap.php';

use Psr\Message\Http\ServerRequestInterface as Request;
use Psr\Message\Http\ResponseInterface as Response;

/**
 * The Dashboard is where all of the controls for the content in the site is
 * located. A user must be authenticated to use the Dashboard.
 */
$app->get('/[dashboard]', function (Request $req, Response $res) {

    return $res;
})->name('dashboard');

$app->run();
