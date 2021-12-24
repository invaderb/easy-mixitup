<?php

/**
 * Plugin Name
 *
 * @package           easy-mixitup
 * @author            Braydon Harris
 * @copyright         2021 Braydon Harris
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       Easy Mixitup
 * Plugin URI:        https://braydonharris.com/easy-mixitup
 * Description:       Plugin for animated filtering, sorting, insertion, removal and more... Beautiful animated DOM manipulation on top of native CSS layout.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Braydon Harris
 * Author URI:        https://braydonharris.com
 * Text Domain:       easy-mixitup
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Update URI:        https://braydonharris.com/easy-mixitup/
 */
 
 /**
 * @constant EASY_MIXIT_PLUGIN_PATH
 * @description Constant for plugin DIR PATH
 */
 
 if (!defined('EASY_MIXITUP_PLUGIN_PATH'))
    define('EASY_MIXITIP_PLUGIN_PATH', plugin_dir_path(__FILE__)) . DIRECTORY_SEPARATOR . 'easy-mixitup';

/**
 * @constant MIXIT_PLUGIN_URL 
 * @description Constant for plugin URL
 */
if (!defined('EASY_MIXITUP_PLUGIN_URL'))
    define('EASY_MIXITUP_PLUGIN_URL', plugin_dir_url(__FILE__));
 
include_once 'inc/shortcode.php';
?>