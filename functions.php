<?php

/**
 * @author Dave Smith-Hayes <me@davesmithhayes.com>
 *
 * This file creates functions that can be used throughout the bootstrapping
 * process.
 */

/**
 * Settings Functions
 *
 * The settings functions are designed to alter the state of the Slim
 * application object during its construction. Depending on the environments
 * during the bootstrapping process determines which settings are being used.
 */

/**
 * The default settings used in both production and development environments.
 */
function settings_load(): array {
    return [
        'settings' => [
            'addContentLengthHeader' => false

            // Add the Logger here
        ]
    ];
}

/**
 * Loads the production applciation settings
 */
function settings_load_production(): array {
    $s = settings_load();
    return $s;
}

/**
 * Loads the development application settings
 */
function settings_load_development(): array {
    $s = settings_load();

    $s['settings']['displayErrorDetails'] = true;

    return $s;
}

/**
 * @param bool
 *      True if you want to load the development settings
 * @return array
 *      The array of application settings
 */
function settings_get(bool $debug = false): array {
    return ($debug) ? settings_load_development() : settings_load_production();
}
