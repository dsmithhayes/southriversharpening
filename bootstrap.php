<?php

require_once 'vendor/autoload.php';

use Slim\Views\Twig;
use Slim\Views\TwigExtension;
use cebe\markdown\MarkdownExtra;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;
use SouthRiverSharpening\Gallery;

/**
 * Set up the application
 */
$app = new Slim\App([
    'settings' => [
        'displayErrorDetails' => true
    ]
]);
$container = $app->getContainer();

/**
 * Initialize the Templates
 */
$container['view_dir'] = dirname(__FILE__) . '/templates';
$container['view_cache'] = dirname(__FILE__) . '/templates/cache';
$container['view'] = function ($container) {
    $view = new Twig($container['view_dir']);

    $view->addExtension(new TwigExtension(
        $container['router'],
        $container['request']->getUri()
    ));

    return $view;
};

/**
 * Initialize the markdown parser
 */
$container['md_parser'] = function ($container) {
    return new MarkdownExtra();
};

/**
 * Add the image gallery
 */
$container['gallery'] = function ($container) {
    return new Gallery(dirname(__FILE__) . '/public/images/photos/');
};

/**
 * The bootstrap file acts as the application initialization.
 */
return $app;
