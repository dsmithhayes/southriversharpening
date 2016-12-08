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
 * Loads the production applciation settings
 */
function settings_load_production(): array {
    // Put the settings for production here
    return [

    ];
}

/**
 * Loads the development application settings
 */
function settings_load_development(): array {
    // Put the settings for development here
    return [

    ];
}

/**
 * @param bool
 *      True if you want to load the development settings
 * @return array
 *      The array of application settings
 */
function settings_set_env(bool $debug = false): array {
    return ($debug) ? settings_load_development() : settings_load_production();
}
