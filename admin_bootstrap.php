<?php

require_once 'vendor/autoload.php';
$app = require_once 'bootstrap.php';

/**
 * Break out the application container
 */
$container = $app->getContainer();

return $app;
