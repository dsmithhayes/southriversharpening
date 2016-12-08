<?php

/**
 * @author Dave Smith-Hayes <me@davesmithhayes>
 */

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
$app->get('/login', function ($req, $res) {
    return $this->view->render($res, 'admin/login.twg', [
        'title' => 'Login'
    ]);
})->setName('login-page');

/**
 * Checks the credentials of the user and logs them in.
 */
$app->post('/login', function ($req, $res, $args) {

    return $res;
})->setName('login-auth');

/**
 * The page to edit the content of the page.
 */
$app->get('/home', function ($req, $res) {
    return $this->view->render($res, 'admin/home.twig', [
        'title' => 'Home'
    ]);
})->setName('home');

/**
 * When changes to the home page are made
 */
$app->post('/home', function ($req, $res, $args) {
    if (!isset($args['update-home']['title'])) {
        $res->getBody()->write('Must have a title!');
        $res = $res->withStatus(500);
    }

    return $res;
});

$app->run();
