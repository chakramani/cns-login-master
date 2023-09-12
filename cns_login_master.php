<?php

/*
Plugin Name: CNS Login Master
Plugin URI: chakramanijoshi@gmail.com
Description: Custom Admin Login 
Version: 1.0.0
Author: Chakramani Joshi
Text Domain: cns-login-master
Author URI: chakramanijoshi@gmail.com
*/

if (!defined('ABSPATH')) {
        exit;
};
/* require plugin loder file */
$init_file = WP_PLUGIN_DIR . DIRECTORY_SEPARATOR . "cns-login-master" . DIRECTORY_SEPARATOR  . "custom-login-form-loader.php";
$asset_file = WP_PLUGIN_DIR . DIRECTORY_SEPARATOR . "cns-login-master" . DIRECTORY_SEPARATOR  . "cns-assets.php";
require $init_file;
require $asset_file;

function login_classes($classes)
{
        $classes[] = 'cns-body';
        return $classes;
}
add_filter('login_body_class', 'login_classes');

