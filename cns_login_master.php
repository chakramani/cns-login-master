<?php


/**
 * Plugin Name: CNS Login Master
 * Plugin URI: https://chakramanijoshi.com.np/
 * Description: Allow users to customize the admin login form. 
 * Version: 1.0.0
 * Author: Chakramani Joshi
 * Text Domain: cns-login-master
 * Author URI: https://chakramanijoshi.com.np/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */



if (!defined('ABSPATH')) {

        exit;
};
define('CNS_PLUGIN_DIR', plugin_dir_path(__FILE__));

/* require plugin loder file */

$init_file = CNS_PLUGIN_DIR . 'cns-login-form-loader.php';

$asset_file = CNS_PLUGIN_DIR . 'cns-assets.php';

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
if (!function_exists('cnslm_login_classes')) {
        function cnslm_login_classes($classes)

        {

                $classes[] = 'cns-body';

                return $classes;
        }

        add_filter('login_body_class', 'cnslm_login_classes');
}
