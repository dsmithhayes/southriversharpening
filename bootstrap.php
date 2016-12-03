<?php

require_once 'vendor/autoload.php';

/**
 * Assures the bootstrap is always in the root of the project directory.
 */
define('ABSPATH', dirname(__FILE__));

/**
 * Acquire all of the dependencies for the container.
 */
use Slim\Views\Twig;
use Slim\Views\TwigExtension;
use cebe\markdown\MarkdownExtra;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;
use SouthRiverSharpening\Gallery;
use SouthRiverSharpening\Services;
use FluentPDO;

/**
 * Set up the application
 */
$app = new Slim\App([
    'settings' => ['displayErrorDetails' => true]
]);

/**
 * Break out the container
 */
$container = $app->getContainer();

/**
 * Loads the configuration files from the config directory.
 */
$container['config'] = function ($container) {
    $tmp = [];

    foreach (scandir(dirname(__FILE__) . '/config') as $conf) {
        if ($conf === '.' || $conf === '..') {
            continue;
        }

        $key = preg_replace('/\.php/', '', $conf);
        $tmp[$key] = require dirname(__FILE__) . '/config/' . $conf;
    }

    if (empty($tmp)) {
        $tmp = ['error' => 'No configuration files loaded.'];
    }

    return $tmp;
};

/**
 * FluentPDO Instance with the SQLite3 Database
 */
$container['fpdo'] = function ($container) {
    $path = $container->config['sqlite']['path'];
    $dsn = "sqlite://{$path}";

    return new FluentPDO($dsn);
};

/**
 * Initialize the Templates
 */
$container['view'] = function ($container) {
    $path = $container->config['views']['path'];
    $cache = $container->config['views']['cache'];

    $view = new Twig($path);

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
 * Raw services data
 */

$container['services'] = function ($container) {
    $path = $container->config['services']['path'];

    if (!$path) {
        throw new \Exception($container->config['error']);
    }

    return new Services($path);
};

/**
 * The bootstrap file acts as the application initialization.
 */
return $app;
