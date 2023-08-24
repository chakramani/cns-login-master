<?php

/*
Plugin Name: White Label Login
Plugin URI: wordpress.enthusiast@gmail.com
Description: Custom Admin Login 
Version: 1.0.0
Author: codepixelz
Author URI: wordpress.enthusiast@gmail.com
*/

if (!defined('ABSPATH')) {
        exit;
};
/* require plugin loder file */
$init_file = WP_PLUGIN_DIR . DIRECTORY_SEPARATOR . "cpm-login-master" . DIRECTORY_SEPARATOR  . "custom-login-form-loader.php";
$asset_file = WP_PLUGIN_DIR . DIRECTORY_SEPARATOR . "cpm-login-master" . DIRECTORY_SEPARATOR  . "cpm-assets.php";
require $init_file;
require $asset_file;


