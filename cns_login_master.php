<?php


/**
 * Plugin Name: CNS Login Master
 * Plugin URI: chakramanijoshi@gmail.com
 * Description: Allow users to customize the admin login form. 
 * Version: 1.0.0
 * Author: charkamanijoshi,dewebkiller,samkumar10
 * Text Domain: cns-login-master
 * Author URI: https://chakramanijoshi.com.np/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */



if (!defined('ABSPATH')) {

        exit;
};

/* require plugin loder file */

$init_file = WP_PLUGIN_DIR . DIRECTORY_SEPARATOR . "cns-login-master" . DIRECTORY_SEPARATOR  . "cns-login-form-loader.php";

$asset_file = WP_PLUGIN_DIR . DIRECTORY_SEPARATOR . "cns-login-master" . DIRECTORY_SEPARATOR  . "cns-assets.php";

require $init_file;

require $asset_file;



/**
 * The function adds the class 'cns-body' to the login body classes.
 * 
 * @param classes The parameter `` is an array that contains the CSS classes applied to the
 * login body element.
 * 
 * @return the modified array of classes.
 */
function login_classes($classes)

{

        $classes[] = 'cns-body';

        return $classes;
}

add_filter('login_body_class', 'login_classes');
