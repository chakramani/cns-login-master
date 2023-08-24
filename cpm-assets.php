<?php

function my_login_logo()
{
    $admin_login = get_option('admin_login_form'); ?>
    <style type="text/css">
        /* logo */
        #login h1 a {
            background-image: url("<?php echo !empty($admin_login['logo']) ? $admin_login['logo'] : ''; ?>");
            width: <?php echo !empty($admin_login['logo_width']) ? $admin_login['logo_width'] : ''; ?>px;
            height: <?php echo !empty($admin_login['logo_height']) ? $admin_login['logo_height'] : ''; ?>px;
            border-radius: 50%;
            background-size: contain;
            background-color: #fff;
            background-repeat: no-repeat;
            /* padding: 10px; */
            border: 5px solid #fff;
            background-position: center;
        }

        /* background image and background color */
        body.login {
            background-image: url("<?php echo !empty($admin_login['bg_image']) ? $admin_login['bg_image'] : ''; ?>");
            background-color: <?php echo !empty($admin_login['bg_color']) ? $admin_login['bg_color']:''; ?>;
            backdrop-filter: blur(<?php echo !empty($admin_login['bg_blur']) ?$admin_login['bg_blur'] : ''; ?>px);
        }

        /* login form background color */
        .login form {
            margin-top: 20px;
            margin-left: 0;
            padding: 26px 24px 34px;
            font-weight: 400;
            overflow: hidden;
            background: <?php echo !empty($admin_login['login_box_bg_color']) ? $admin_login['login_box_bg_color'] : ''; ?> !important;
            border: 1px solid <?php echo !empty($admin_login['login_box_bg_color']) ? $admin_login['login_box_bg_color'] : ''; ?>;
            box-shadow: 0 1px 3px rgba(0, 0, 0, .04);
        }


        /* alert message background text color and background color */
        .login #login_error,
        .login .message,
        .login .success {
            border-left: 4px solid #72aee6;
            padding: 12px;
            margin-left: 0;
            margin-bottom: 20px;
            background-color: <?php echo !empty($admin_login['alert_box_bg_color'])? $admin_login['alert_box_bg_color'] : ''; ?> !important;
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
            word-wrap: break-word;
            color: <?php echo !empty($admin_login['alert_box_text_color']) ? $admin_login['alert_box_text_color'] : ''; ?> !important;
        }

        body.login div#login label{
            font-size: <?php echo !empty($admin_login['font_size']) ? $admin_login['font_size'] : ''; ?>px;
        }
        body.login div#login #nav a,body.login div#login #backtoblog a{
            font-size: <?php echo !empty($admin_login['link_font_size']) ? $admin_login['link_font_size'] : ''; ?>px;
            color: <?php echo '#'.!empty($admin_login['link_text_color']) ? $admin_login['link_text_color'] : ''; ?>;
        }
    </style>
<?php }
add_action('login_enqueue_scripts', 'my_login_logo');
