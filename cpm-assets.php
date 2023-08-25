<?php

function my_login_logo()
{
    $admin_login = get_option('admin_login_form'); ?>
    <style type="text/css">
        body.wl-body #login {
            width: <?php echo !empty($admin_login['login_form_container_width']) ? $admin_login['login_form_container_width'] : ''; ?>px ;
            height: auto;
            margin: <?php echo !empty($admin_login['login_container_margin_top']) ? $admin_login['login_container_margin_top'] : ''; ?>px auto <?php echo !empty($admin_login['login_container_margin_bottom']) ? $admin_login['login_container_margin_bottom'] : ''; ?>px auto ;
            padding: <?php echo !empty($admin_login['login_container_padding_top']) ? $admin_login['login_container_padding_top'] : ''; ?>px <?php echo !empty($admin_login['login_container_padding_right']) ? $admin_login['login_container_padding_right'] : ''; ?>px <?php echo !empty($admin_login['login_container_padding_bottom']) ? $admin_login['login_container_padding_bottom'] : ''; ?>px <?php echo !empty($admin_login['login_container_padding_left']) ? $admin_login['login_container_padding_left'] : ''; ?>px ;
        }

        /* logo */
        body.wl-body #login h1 a {
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
        body.wl-body.login {
            background-image: url("<?php echo !empty($admin_login['bg_image']) ? $admin_login['bg_image'] : ''; ?>");
            background-color: <?php echo !empty($admin_login['bg_color']) ? $admin_login['bg_color'] : ''; ?>;
            backdrop-filter: blur(<?php echo !empty($admin_login['bg_blur']) ? $admin_login['bg_blur'] : ''; ?>px);
        }

        /* login form background color */
        body.wl-body #loginform {
            margin: <?php echo !empty($admin_login['login_form_margin_top']) ? $admin_login['login_form_margin_top'] : ''; ?>px <?php echo !empty($admin_login['login_form_margin_right']) ? $admin_login['login_form_margin_right'] : ''; ?>px <?php echo !empty($admin_login['login_form_margin_bottom']) ? $admin_login['login_form_margin_bottom'] : ''; ?>px <?php echo !empty($admin_login['login_form_margin_left']) ? $admin_login['login_form_margin_left'] : ''; ?>px;
            padding: <?php echo !empty($admin_login['login_form_padding_top']) ? $admin_login['login_form_padding_top'] : ''; ?>px <?php echo !empty($admin_login['login_form_padding_right']) ? $admin_login['login_form_padding_right'] : ''; ?>px <?php echo !empty($admin_login['login_form_padding_bottom']) ? $admin_login['login_form_padding_bottom'] : ''; ?>px <?php echo !empty($admin_login['login_form_padding_left']) ? $admin_login['login_form_padding_left'] : ''; ?>px;
            font-weight: 400;
            overflow: hidden;
            background: <?php echo !empty($admin_login['login_box_bg_color']) ? $admin_login['login_box_bg_color'] : ''; ?> ;
            border: 1px solid <?php echo !empty($admin_login['login_box_bg_color']) ? $admin_login['login_box_bg_color'] : ''; ?>;
            box-shadow: 0 1px 3px rgba(0, 0, 0, .04);
        }


        /* alert message background text color and background color */
        body.wl-body.login #login_error,
        body.wl-body.login .message,
        body.wl-body.login .success {
            width: <?php echo !empty($admin_login['message_box_width']) ? $admin_login['message_box_width'] . '%' : ''; ?>;
            height: auto;
            border-left: 4px solid #72aee6;
            padding: <?php echo !empty($admin_login['message_box_padding_top']) ? $admin_login['message_box_padding_top'] : ''; ?>px <?php echo !empty($admin_login['message_box_padding_right']) ? $admin_login['message_box_padding_right'] : ''; ?>px <?php echo !empty($admin_login['message_box_padding_bottom']) ? $admin_login['message_box_padding_bottom'] : ''; ?>px <?php echo !empty($admin_login['message_box_padding_left']) ? $admin_login['message_box_padding_left'] : ''; ?>px ;
            margin: <?php echo !empty($admin_login['message_box_margin_top']) ? $admin_login['message_box_margin_top'] : ''; ?>px <?php echo !empty($admin_login['message_box_margin_right']) ? $admin_login['message_box_margin_right'] : ''; ?>px <?php echo !empty($admin_login['message_box_margin_bottom']) ? $admin_login['message_box_margin_bottom'] : ''; ?>px <?php echo !empty($admin_login['message_box_margin_left']) ? $admin_login['message_box_margin_left'] : ''; ?>px ;
            background-color: <?php echo !empty($admin_login['alert_box_bg_color']) ? $admin_login['alert_box_bg_color'] : ''; ?> ;
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
            word-wrap: break-word;
            color: <?php echo !empty($admin_login['alert_box_text_color']) ? $admin_login['alert_box_text_color'] : ''; ?> ;
        }

        body.wl-body.login div#login label {
            font-size: <?php echo !empty($admin_login['font_size']) ? $admin_login['font_size'] : ''; ?>px;
            color: <?php echo '#' . !empty($admin_login['text_color']) ? $admin_login['text_color'] : ''; ?>;
        }

        body.wl-body.login div#login #nav a,
        body.wl-body.login div#login #backtoblog a {
            font-size: <?php echo !empty($admin_login['link_font_size']) ? $admin_login['link_font_size'] : ''; ?>px;
            color: <?php echo '#' . !empty($admin_login['link_text_color']) ? $admin_login['link_text_color'] : ''; ?>;
        }

        body.wl-body #loginform #wp-submit {
            font-size: <?php echo !empty($admin_login['link_font_size']) ? $admin_login['link_font_size'] : ''; ?>px;
            color: <?php echo '#' . !empty($admin_login['login_btn_color']) ? $admin_login['login_btn_color'] : ''; ?>;
            background: <?php echo '#' . !empty($admin_login['login_btn_bg_color']) ? $admin_login['login_btn_bg_color'] : ''; ?>;
            border-color: <?php echo '#' . !empty($admin_login['login_btn_bg_color']) ? $admin_login['login_btn_bg_color'] : ''; ?>;
        }
    </style>
<?php }
add_action('login_enqueue_scripts', 'my_login_logo');
