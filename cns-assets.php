<?php
if ( ! defined( 'ABSPATH' ) ) exit;

if (!function_exists('cnslm_login_logo')) {
    function cnslm_login_logo()

    {

        $admin_login = get_option('admin_login_form'); ?>

        <style type="text/css">
            body.cns-body #login {

                width: <?php echo !empty($admin_login['login_form_container_width']) ? $admin_login['login_form_container_width'] : '320'; ?>px;

                height: auto;

                margin: <?php echo !empty($admin_login['login_container_margin_top']) ? $admin_login['login_container_margin_top'] : ''; ?>px auto <?php echo !empty($admin_login['login_container_margin_bottom']) ? $admin_login['login_container_margin_bottom'] : ''; ?>px auto;

                padding: <?php echo !empty($admin_login['login_container_padding_top']) ? $admin_login['login_container_padding_top'] : ''; ?>px <?php echo !empty($admin_login['login_container_padding_right']) ? $admin_login['login_container_padding_right'] : ''; ?>px <?php echo !empty($admin_login['login_container_padding_bottom']) ? $admin_login['login_container_padding_bottom'] : ''; ?>px <?php echo !empty($admin_login['login_container_padding_left']) ? $admin_login['login_container_padding_left'] : ''; ?>px;

            }



            /* logo */

            body.cns-body #login h1 a {

                background-image: url("<?php echo !empty($admin_login['logo']) ? $admin_login['logo'] : plugin_dir_url(__FILE__) . '/assets/images/wordpress-logo.svg'; ?>");

                width: <?php echo !empty($admin_login['logo_width']) ? $admin_login['logo_width'] : '84'; ?>px;

                height: <?php echo !empty($admin_login['logo_height']) ? $admin_login['logo_height'] : '84'; ?>px;

                border-radius: 50%;

                background-size: contain;

                /* background-color: #fff; */

                background-position: center top;

            }



            /* background image and background color */

            body.cns-body.login {

                background-image: url("<?php echo !empty($admin_login['bg_image']) ? $admin_login['bg_image'] : ''; ?>");

                background-color: <?php echo !empty($admin_login['bg_color']) ? $admin_login['bg_color'] : '#f0f0f1'; ?>;

                backdrop-filter: blur(<?php echo !empty($admin_login['bg_blur']) ? $admin_login['bg_blur'] : ''; ?>px);

                background-repeat: <?php echo !empty($admin_login['bg_repeat']) ? $admin_login['bg_repeat'] : ''; ?>;

                background-size: <?php echo !empty($admin_login['bg_size']) ? $admin_login['bg_size'] : ''; ?>;

            }



            /* login form background color */

            body.cns-body #loginform {

                margin: <?php echo !empty($admin_login['login_form_margin_top']) ? $admin_login['login_form_margin_top'] : '20'; ?>px <?php echo !empty($admin_login['login_form_margin_right']) ? $admin_login['login_form_margin_right'] : ''; ?>px <?php echo !empty($admin_login['login_form_margin_bottom']) ? $admin_login['login_form_margin_bottom'] : ''; ?>px <?php echo !empty($admin_login['login_form_margin_left']) ? $admin_login['login_form_margin_left'] : '0'; ?>px;

                padding: <?php echo !empty($admin_login['login_form_padding_top']) ? $admin_login['login_form_padding_top'] : '26'; ?>px <?php echo !empty($admin_login['login_form_padding_right']) ? $admin_login['login_form_padding_right'] : '24'; ?>px <?php echo !empty($admin_login['login_form_padding_bottom']) ? $admin_login['login_form_padding_bottom'] : '34'; ?>px <?php echo !empty($admin_login['login_form_padding_left']) ? $admin_login['login_form_padding_left'] : ''; ?>px;

                background: <?php echo !empty($admin_login['login_box_bg_color']) ? $admin_login['login_box_bg_color'] : '#fff'; ?>;

                border: 1px solid <?php echo '#' . !empty($admin_login['login_box_bg_color']) ? $admin_login['login_box_bg_color'] : '#c3c4c7'; ?>;

            }


            /* alert message background text color and background color */

            body.cns-body.login #login_error,

            body.cns-body.login .message,

            body.cns-body.login .success {

                width: <?php echo !empty($admin_login['message_box_width']) ? $admin_login['message_box_width'] . '%' : ''; ?>;

                height: auto;

                border-left: 4px solid #72aee6;

                padding: <?php echo !empty($admin_login['message_box_padding_top']) ? $admin_login['message_box_padding_top'] : ''; ?>px <?php echo !empty($admin_login['message_box_padding_right']) ? $admin_login['message_box_padding_right'] : ''; ?>px <?php echo !empty($admin_login['message_box_padding_bottom']) ? $admin_login['message_box_padding_bottom'] : ''; ?>px <?php echo !empty($admin_login['message_box_padding_left']) ? $admin_login['message_box_padding_left'] : ''; ?>px;

                margin: <?php echo !empty($admin_login['message_box_margin_top']) ? $admin_login['message_box_margin_top'] : ''; ?>px <?php echo !empty($admin_login['message_box_margin_right']) ? $admin_login['message_box_margin_right'] : ''; ?>px <?php echo !empty($admin_login['message_box_margin_bottom']) ? $admin_login['message_box_margin_bottom'] : ''; ?>px <?php echo !empty($admin_login['message_box_margin_left']) ? $admin_login['message_box_margin_left'] : ''; ?>px;

                background-color: <?php echo !empty($admin_login['alert_box_bg_color']) ? $admin_login['alert_box_bg_color'] : ''; ?>;

                box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);

                word-wrap: break-word;

                color: <?php echo !empty($admin_login['alert_box_text_color']) ? $admin_login['alert_box_text_color'] : ''; ?>;

            }



            body.cns-body.login div#login label {

                font-size: <?php echo !empty($admin_login['font_size']) ? $admin_login['font_size'] : ''; ?>px;

                color: <?php echo '#' . !empty($admin_login['text_color']) ? $admin_login['text_color'] : ''; ?>;

            }



            body.cns-body.login div#login #nav a,

            body.cns-body.login div#login #backtoblog a {

                font-size: <?php echo !empty($admin_login['link_font_size']) ? $admin_login['link_font_size'] : '13'; ?>px;

                color: <?php echo '#' . !empty($admin_login['link_text_color']) ? $admin_login['link_text_color'] : '#50575e'; ?>;

            }



            body.cns-body #loginform #wp-submit {

                font-size: <?php echo !empty($admin_login['link_font_size']) ? $admin_login['link_font_size'] : '13'; ?>px;

                color: <?php echo '#' . !empty($admin_login['login_btn_color']) ? $admin_login['login_btn_color'] : ''; ?>;

                background: <?php echo '#' . !empty($admin_login['login_btn_bg_color']) ? $admin_login['login_btn_bg_color'] : ''; ?>;

                border-color: <?php echo '#' . !empty($admin_login['login_btn_bg_color']) ? $admin_login['login_btn_bg_color'] : ''; ?>;

                margin: <?php echo !empty($admin_login['login_btn_margin_top']) ? $admin_login['login_btn_margin_top'] : ''; ?>px <?php echo !empty($admin_login['login_btn_margin_right']) ? $admin_login['login_btn_margin_right'] : ''; ?>px <?php echo !empty($admin_login['login_btn_margin_bottom']) ? $admin_login['login_btn_margin_bottom'] : ''; ?>px <?php echo !empty($admin_login['login_btn_margin_left']) ? $admin_login['login_btn_margin_left'] : ''; ?>px;

                padding: <?php echo !empty($admin_login['login_btn_padding_top']) ? $admin_login['login_btn_padding_top'] : '0'; ?>px <?php echo !empty($admin_login['login_btn_padding_right']) ? $admin_login['login_btn_padding_right'] : '12'; ?>px <?php echo !empty($admin_login['login_btn_padding_bottom']) ? $admin_login['login_btn_padding_bottom'] : ''; ?>px <?php echo !empty($admin_login['login_btn_padding_left']) ? $admin_login['login_btn_padding_left'] : ''; ?>px;

            }
        </style>

<?php }

    add_action('login_enqueue_scripts', 'cnslm_login_logo');
}
