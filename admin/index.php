<?php

$app = require_once '../admin_bootstrap.php';

use Psr\Message\Http\ServerRequestInterface as Request;
use Psr\Message\Http\ResponseInterface as Response;

/**
 * The Dashboard is where all of the controls for the content in the site is
 * located. A user must be authenticated to use the Dashboard.
 */
$app->get('/[dashboard]', function ($req, $res) {
    return $this->view->render($res, 'admin/dashboard.twig', [
        'title' => 'Admin Dashboard'
    ]);
})->setName('dashboard');

/**
 * Get the Login form page
 */
$app->get('/login', function (Request $req, Response $res) {
    return $this->view->render($res, 'admin/login.twg', [
        'title' => 'Login'
    ]);
})->setName('login-page');

/**
 * Checks the credentials of the user and logs them in.
 */
$app->post('/login', function (Request $req, Response $res) {

    return $res;
})->setName('login-auth');

$app->get('/home', function (Request $req, Response $res) {
    return $this->view->render($res, 'admin/home.twig', [
        'title' => 'Home'
    ]);
});

$app->run();
