<?php

if (!defined('ABSPATH')) {
    return [ 'error' => 'ABSPATH Not defined.' ];
}

return [
    'path' => ABSPATH . '/templates',
    'cache' => ABSPATH . '/templates/cache'
];
