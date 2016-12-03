<?php

/**
 * @author Dave Smith-Hayes <me@davesmithhayes.com>
 */

/**
 * The entry point of the application. This is where all the main routing
 * occurs. The bootstrap file required below will set up the Slim application
 * with all its necessary middleware and dependencies
 */
$app = require '../bootstrap.php';

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

/**
 * The home page is accessible through `/` and `/home`
 */
$app->get('/[home]', function (Request $req, Response $res) {
    return $this->view->render($res, 'home.twig', [
        'title' => 'Home'
    ]);
})->setName('home');

/**
 * The services page describes what services are available to customers
 */
$app->get('/services', function (Request $req, Response $res) {
    $services = $this->services->getServices();

    return $this->view->render($res, 'services.twig', [
        'title' => 'Services',
        'services' => $services
    ]);
})->setName('services');

/**
 * The about page describes the history of the company
 */
$app->get('/about', function (Request $req, Response $res) {
    return $this->view->render($res, 'about.twig', [
        'title' => 'About'
    ]);
})->setName('about');

/**
 * I figured a dedicated gallery page is some thing they'd want
 */
$app->get('/gallery', function (Request $req, Response $res) {
    return $this->view->render($res, 'gallery.twig', [
        'imageList' => $this->gallery->readDir(),
        'title' => 'Gallery'
    ]);
})->setName('gallery');

/**
 * The contact page will describe methods of contacting the copany
 */
$app->get('/contact', function (Request $req, Response $res) {
    return $this->view->render($res, 'contact.twig', [
        'title' => 'Contact'
    ]);
})->setName('contact');

/**
 * The entry point of the application
 */
$app->run();
