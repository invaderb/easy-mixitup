<?php

/**
 * Plugin Name
 *
 * @package           wp-mixitup
 * @author            Braydon Harris
 * @copyright         2021 Braydon Harris
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       wp-mixitup
 * Plugin URI:        https://braydonharris.com/wp-mixitup
 * Description:       Plugin for animated filtering, sorting, insertion, removal and more... Beautiful animated DOM manipulation on top of native CSS layout.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Braydon Harros
 * Author URI:        https://braydonharris.com
 * Text Domain:       wp-mixitup
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Update URI:        https://braydonharris.com/wp-mixitup/
 */
 
 /**
 * @constant MIXIT_PLUGIN_PATH
 * @description Constant for plugin DIR PATH
 */
 
 if (!defined('WP_MIXITUP_PLUGIN_PATH'))
    define('WP_MIXITIP_PLUGIN_PATH', plugin_dir_path(__FILE__)) . DIRECTORY_SEPARATOR . 'wp-mixitup';

/**
 * @constant MIXIT_PLUGIN_URL 
 * @description Constant for plugin URL
 */
if (!defined('WP_MIXITUP_PLUGIN_URL'))
    define('WP_MIXITUP_PLUGIN_URL', plugin_dir_url(__FILE__));
 
include_once 'inc/shortcode.php';
?>