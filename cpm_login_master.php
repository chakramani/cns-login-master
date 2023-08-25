<?php

/*
Plugin Name: CM Custom Login
Plugin URI: chakramanijoshi@gmail.com
Description: Custom Admin Login 
Version: 1.0.0
Author: codepixelz
Author URI: chakramanijoshi@gmail.com
*/

if (!defined('ABSPATH')) {
        exit;
};
/* require plugin loder file */
$init_file = WP_PLUGIN_DIR . DIRECTORY_SEPARATOR . "cpm-login-master" . DIRECTORY_SEPARATOR  . "custom-login-form-loader.php";
$asset_file = WP_PLUGIN_DIR . DIRECTORY_SEPARATOR . "cpm-login-master" . DIRECTORY_SEPARATOR  . "cpm-assets.php";
require $init_file;
require $asset_file;
function login_classes($classes)
{
        $classes[] = 'wl-body';
        return $classes;
}
add_filter('login_body_class', 'login_classes');

