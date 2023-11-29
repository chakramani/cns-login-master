<?php

function cns_admin_login_page_enqueue()

{

        $screen = get_current_screen();



        // Check screen base and page

        if ('toplevel_page_cns_login_master' === $screen->base && $_GET['page'] === 'cns_login_master') {

                wp_enqueue_style('cns_admin_login_form_css_admin', plugin_dir_url(__FILE__) . '/style.css');

                wp_enqueue_style('vertical-tab-css', plugin_dir_url(__FILE__) . '/assets/css/vertical-tab.css');



                wp_enqueue_media();

                wp_enqueue_script('cns_admin_login_form_js_admin', plugin_dir_url(__FILE__) . 'main.js');

                wp_enqueue_script('vertical-tab-js', plugin_dir_url(__FILE__) . '/assets/js/vertical-tab.js', '', '', true);
        }
}

add_action('admin_enqueue_scripts', 'cns_admin_login_page_enqueue');



add_action('admin_menu', 'cns_custom_admin_login_form');

function cns_custom_admin_login_form()

{

        $cns_icon = plugin_dir_url(__FILE__) . '/assets/images/cns-dashicon.png';;

        add_menu_page('CNS Login Master', 'CNS Login Master', 'manage_options', 'cns_login_master', 'cns_custom_login_page', $cns_icon);
}

function cns_custom_login_page()

{

        $logo = esc_url(wp_get_attachment_url(get_theme_mod('custom_logo')));
        $site_title = get_bloginfo('name');

?>

        <div class="wrap cns-wrapper">




                <?php if (!empty($logo)) { ?>
                        <div class="cns-header">

                                <img src="<?php echo $logo; ?>" alt="site logo" class="cns-logo" width="200">

                        </div>
                <?php } else { ?>
                        <div class="cns-header cns_site_title">

                                <h4><?php echo $site_title; ?></h4>

                        </div>
                <?php } ?>

                <div class="cns-sub-header">

                        <p><?php __('This plugin helps you to customize the admin login page.', 'cns-login-master'); ?></p>

                </div>

                <form method="post" action="options.php" id="cns-form">

                        <fieldset>

                                <?php

                                settings_fields('login-form-setting-group');

                                do_settings_sections('login-form-setting'); ?>

                                <div class="submitbtn">

                                        <?php submit_button('', 'primary', '', false); ?>

                                </div>

                                <p class="cns-copyright"><?php __('Made with', 'cns-login-master'); ?> <span>&hearts;</span> <?php __('by CNS', 'cns-login-master'); ?></p>

                        </fieldset>

                </form>

        </div>

<?php }











function cns_settings_fields()

{

        add_settings_section('general-section', '', 'cns_admin_login_logo', 'login-form-setting');



        register_setting('login-form-setting-group', 'admin_login_form');
}

add_action('admin_init', 'cns_settings_fields');





function cns_admin_login_logo()

{

        $admin_login = get_option('admin_login_form');  ?>



        <div class="cns-site-wrapper">

                <section class="cns-tabs-wrapper">

                        <div class="cns-tabs-container">

                                <div class="cns-tabs-block">

                                        <div id="cns-tabs-section" class="cns-tabs">

                                                <ul class="cns-tab-head">

                                                        <li>

                                                                <a href="#cns-tab-1" class="cns-tab-link active"> <i class="dashicons dashicons-wordpress"></i><span class="tab-label"><?php __('Logo', 'cns-login-master'); ?></span></a>

                                                        </li>

                                                        <li>

                                                                <a href="#cns-tab-2" class="cns-tab-link"> <i class="dashicons dashicons-media-default"></i> <span class="tab-label"><?php __('Body Background', 'cns-login-master'); ?></span></a>

                                                        </li>

                                                        <li>

                                                                <a href="#cns-tab-3" class="cns-tab-link"> <i class="dashicons dashicons-menu"></i> <span class="tab-label"><?php __('Form Container', 'cns-login-master'); ?></span></a>

                                                        </li>

                                                        <li>

                                                                <a href="#cns-tab-4" class="cns-tab-link"> <i class="dashicons dashicons-unlock"></i> <span class="tab-label"><?php __('Login Form', 'cns-login-master'); ?></span></a>

                                                        </li>

                                                        <li>

                                                                <a href="#cns-tab-5" class="cns-tab-link"> <i class="dashicons dashicons-info"></i> <span class="tab-label"><?php __('Message Box', 'cns-login-master'); ?></span></a>

                                                        </li>

                                                        <li>

                                                                <a href="#cns-tab-6" class="cns-tab-link"> <i class="dashicons dashicons-admin-links"></i> <span class="tab-label"><?php __('Link', 'cns-login-master'); ?></span></a>

                                                        </li>

                                                        <li>

                                                                <a href="#cns-tab-7" class="cns-tab-link"> <i class="dashicons dashicons-button"></i> <span class="tab-label"><?php __('Button', 'cns-login-master'); ?></span></a>

                                                        </li>

                                                </ul>



                                                <div class="section-wrapper">

                                                        <section id="cns-tab-1" class="cns-tab-body entry-content active active-content">

                                                                <fieldset>

                                                                        <div class="cns-login">

                                                                                <h2><?php __('Logo', 'cns-login-master'); ?></h2>

                                                                                <div class="cns-label-title">

                                                                                        <input type='hidden' id='admin_login_logo_hidden' name=admin_login_form[logo] value='<?php echo !empty($admin_login['logo']) ? $admin_login['logo'] : ''; ?>' />

                                                                                        <label for="logo"><?php __('Logo Settings', 'cns-login-master'); ?></label>

                                                                                </div>

                                                                                <div class="cns-upload-box">

                                                                                        <div class="cns-upload-btn-box">

                                                                                                <?php if (empty($admin_login['logo'])) { ?>

                                                                                                        <label class="cns-upload-btn-label pre-upload-logo">

                                                                                                                <input type='button' class='cns-upload-btn' value='Upload Logo' id='admin_login_logo' />

                                                                                                        </label>

                                                                                                <?php } else { ?>

                                                                                                        <div class="cns-img-upload mainlogo">

                                                                                                                <div class="avatar-edit">

                                                                                                                        <input type='button' class='cns-upload-btn' value='Upload Image' />

                                                                                                                        <label for="imageUpload" id='admin_login_logo'></label>

                                                                                                                        <label for="imageDelete" id='delete_admin_login_logo'></label>

                                                                                                                </div>

                                                                                                                <div class="avatar-preview">

                                                                                                                        <div id="image_preview_login_logo" style="background-image: url(<?php echo !empty($admin_login['logo']) ? $admin_login['logo'] : ''; ?>)"></div>

                                                                                                                </div>

                                                                                                        </div>

                                                                                                <?php } ?>

                                                                                        </div>

                                                                                </div>

                                                                        </div>

                                                                        <div class="cns-login">

                                                                                <div class="cns-label-title">

                                                                                        <label for="background-bkur"><?php __('Logo width', 'cns-login-master'); ?></label>

                                                                                </div>

                                                                                <div class="logo-width-wrapper">

                                                                                        <input type='range' name=admin_login_form[logo_width] class='logo-width' value='<?php echo !empty($admin_login['logo_width']) ? $admin_login['logo_width'] : 0; ?>' min="0" max="200" />

                                                                                        <label for="" class="logo-width-range"><?php echo !empty($admin_login['logo_width']) ? $admin_login['logo_width'] : 0; ?>px</label>

                                                                                </div>

                                                                        </div>

                                                                        <div class="cns-login">

                                                                                <div class="cns-label-title">

                                                                                        <label for="background-bkur"><?php __('Logo height', 'cns-login-master'); ?></label>

                                                                                </div>

                                                                                <div class="logo-height-wrapper">

                                                                                        <input type='range' name=admin_login_form[logo_height] class='logo-height' value='<?php echo !empty($admin_login['logo_height']) ? $admin_login['logo_height'] : 0; ?>' min="0" max="200" />

                                                                                        <label for="" class="logo-height-range"><?php echo !empty($admin_login['logo_height']) ? $admin_login['logo_height'] : 0; ?>px</label>

                                                                                </div>

                                                                        </div>

                                                                </fieldset>

                                                        </section>



                                                        <section id="cns-tab-2" class="cns-tab-body entry-content">

                                                                <fieldset class="cns-background-settings">



                                                                        <div class="cns-login">

                                                                                <h2> <?php __('Body Background Settings', 'cns-login-master'); ?></h2>

                                                                                <div class="cns-label-title">

                                                                                        <input type='hidden' id='admin_login_bg_image_hidden' name=admin_login_form[bg_image] value='<?php echo !empty($admin_login['bg_image']) ? $admin_login['bg_image'] : ''; ?>' />

                                                                                        <label for="background-image"><?php __('Background Image', 'cns-login-master'); ?></label>

                                                                                </div>

                                                                                <div class="cns-upload-box">

                                                                                        <div class="cns-upload-btn-box">

                                                                                                <?php if (empty($admin_login['bg_image'])) { ?>

                                                                                                        <label class="cns-upload-btn-label pre-upload-bg-image">

                                                                                                                <input type='button' class='cns-upload-btn ' value='Upload Image' id='admin_login_background_imge' />

                                                                                                        </label>

                                                                                                <?php } else { ?>

                                                                                                        <div class="cns-img-upload">

                                                                                                                <div class="avatar-edit">

                                                                                                                        <input type='button' class='cns-upload-btn' value='Upload Image' />

                                                                                                                        <label for="imageUpload" id='admin_login_background_imge'></label>

                                                                                                                        <label for="imageDelete" id='delete_admin_login_background_imge'></label>

                                                                                                                </div>

                                                                                                                <div class="avatar-preview image-square">

                                                                                                                        <div id="mobile_image_preview_login_bg" style="background-image: url(<?php echo !empty($admin_login['bg_image']) ? $admin_login['bg_image'] : ''; ?>)"></div>

                                                                                                                </div>

                                                                                                        </div>

                                                                                                <?php } ?>

                                                                                        </div>

                                                                                </div>

                                                                        </div>

                                                                        <div class="cns-login">

                                                                                <div class="cns-label-title">

                                                                                        <label for="background-color"><?php __('Background Color', 'cns-login-master'); ?></label>

                                                                                </div>

                                                                                <div class="wrapper login-form-bg-color-wrapper">

                                                                                        <input type='color' name=admin_login_form[bg_color] class='' value='<?php echo !empty($admin_login['bg_color']) ? $admin_login['bg_color'] : ''; ?>' />

                                                                                        <?php if (!empty($admin_login['bg_color'])) { ?><div class="color-code" tooltip="Slide to the left" flow="left"><?php echo !empty($admin_login['bg_color']) ? $admin_login['bg_color'] : ''; ?></div><span class="copied-message"></span><?php } ?>

                                                                                </div>

                                                                        </div>

                                                                        <div class="cns-login">

                                                                                <div class="cns-label-title">

                                                                                        <label for="background-bkur"><?php __('Background Blur', 'cns-login-master'); ?></label>

                                                                                </div>

                                                                                <div class="body-bg-image-blur-wrapper">

                                                                                        <input type='range' name=admin_login_form[bg_blur] class='bg-blur' value='<?php echo !empty($admin_login['bg_blur']) ? $admin_login['bg_blur'] : 0; ?>' min="0" max="100" />

                                                                                        <label for="" class="bg-blur-range"><?php echo !empty($admin_login['bg_blur']) ? $admin_login['bg_blur'] : 0; ?>px</label>

                                                                                </div>

                                                                        </div>

                                                                        <div class="cns-login">

                                                                                <div class="cns-label-title">

                                                                                        <label for="background-bkur"><?php __('Background Repeat', 'cns-login-master'); ?></label>

                                                                                </div>

                                                                                <div class="body-bg-image-repeat-wrapper">

                                                                                        <select name="admin_login_form[bg_repeat]" class="bg-repeat">

                                                                                                <option value="inherit" <?php selected(!empty($admin_login['bg_repeat']) ? $admin_login['bg_repeat'] : '', 'inherit'); ?>><?php __('Inherit', 'cns-login-master'); ?></option>

                                                                                                <option value="initital" <?php selected(!empty($admin_login['bg_repeat']) ? $admin_login['bg_repeat'] : '', 'initital'); ?>><?php __('Initital', 'cns-login-master'); ?></option>

                                                                                                <option value="no-repeat" <?php selected(!empty($admin_login['bg_repeat']) ? $admin_login['bg_repeat'] : '', 'no-repeat'); ?>><?php __('No-repeat', 'cns-login-master'); ?></option>

                                                                                                <option value="repeat" <?php selected(!empty($admin_login['bg_repeat']) ? $admin_login['bg_repeat'] : '', 'repeat'); ?>><?php __('Repeat', 'cns-login-master'); ?></option>

                                                                                                <option value="repeat-x" <?php selected(!empty($admin_login['bg_repeat']) ? $admin_login['bg_repeat'] : '', 'repeat-x'); ?>><?php __('Repeat-x', 'cns-login-master'); ?></option>

                                                                                                <option value="repeat-y" <?php selected(!empty($admin_login['bg_repeat']) ? $admin_login['bg_repeat'] : '', 'repeat-y'); ?>><?php __('Repeat-y', 'cns-login-master'); ?></option>

                                                                                                <option value="revert" <?php selected(!empty($admin_login['bg_repeat']) ? $admin_login['bg_repeat'] : '', 'revert'); ?>><?php __('Revert', 'cns-login-master'); ?></option>

                                                                                                <option value="round" <?php selected(!empty($admin_login['bg_repeat']) ? $admin_login['bg_repeat'] : '', 'round'); ?>><?php __('Round', 'cns-login-master'); ?></option>

                                                                                                <option value="space" <?php selected(!empty($admin_login['bg_repeat']) ? $admin_login['bg_repeat'] : '', 'space'); ?>><?php __('Space', 'cns-login-master'); ?></option>

                                                                                                <option value="unset" <?php selected(!empty($admin_login['bg_repeat']) ? $admin_login['bg_repeat'] : '', 'unset'); ?>><?php __('Unset', 'cns-login-master'); ?></option>

                                                                                        </select>

                                                                                </div>

                                                                        </div>

                                                                        <div class="cns-login">

                                                                                <div class="cns-label-title">

                                                                                        <label for="background-bkur"><?php __('Background Size', 'cns-login-master'); ?></label>

                                                                                </div>

                                                                                <div class="body-bg-image-size-wrapper">

                                                                                        <select name="admin_login_form[bg_size]" class="bg-size">

                                                                                                <option value="auto" <?php selected(!empty($admin_login['bg_size']) ? $admin_login['bg_size'] : '', 'auto'); ?>><?php __('Auto', 'cns-login-master'); ?></option>

                                                                                                <option value="contain" <?php selected(!empty($admin_login['bg_size']) ? $admin_login['bg_size'] : '', 'contain'); ?>><?php __('Contain', 'cns-login-master'); ?></option>

                                                                                                <option value="cover" <?php selected(!empty($admin_login['bg_size']) ? $admin_login['bg_size'] : '', 'cover'); ?>><?php __('Cover', 'cns-login-master'); ?></option>

                                                                                                <option value="inherit" <?php selected(!empty($admin_login['bg_size']) ? $admin_login['bg_size'] : '', 'inherit'); ?>><?php __('Inherit', 'cns-login-master'); ?></option>

                                                                                                <option value="initital" <?php selected(!empty($admin_login['bg_size']) ? $admin_login['bg_size'] : '', 'initital'); ?>><?php __('Initital', 'cns-login-master'); ?></option>

                                                                                                <option value="revert" <?php selected(!empty($admin_login['bg_size']) ? $admin_login['bg_size'] : '', 'revert'); ?>><?php __('Revert', 'cns-login-master'); ?></option>

                                                                                                <option value="unset" <?php selected(!empty($admin_login['bg_size']) ? $admin_login['bg_size'] : '', 'unset'); ?>><?php __('Unset', 'cns-login-master'); ?></option>

                                                                                        </select>

                                                                                </div>

                                                                        </div>





                                                                </fieldset>

                                                        </section>



                                                        <section id="cns-tab-3" class="cns-tab-body entry-content">



                                                                <fieldset>



                                                                        <div class="cns-login">

                                                                                <h2> <?php __('Form Container Settings', 'cns-login-master'); ?></h2>

                                                                                <div class="cns-label-title">

                                                                                        <label for="background-bkur"><?php __('Container Width', 'cns-login-master'); ?></label>

                                                                                </div>

                                                                                <div class="login-form-container-width-wrapper">

                                                                                        <input type='range' name=admin_login_form[login_form_container_width] class='form-container-width' value='<?php echo !empty($admin_login['login_form_container_width']) ? $admin_login['login_form_container_width'] : 0; ?>' min="0" max="1000" />

                                                                                        <label for="" class="form-container-width-range"><?php echo !empty($admin_login['login_form_container_width']) ? $admin_login['login_form_container_width'] : 0; ?>px</label>

                                                                                </div>

                                                                        </div>



                                                                        <div class="cns-login">

                                                                                <div class="cns-label-title">

                                                                                        <label for="background-bkur"><?php __('Margin', 'cns-login-master'); ?></label>

                                                                                </div>

                                                                                <div class="login-container-margin-wrapper">

                                                                                        <input type='number' name=admin_login_form[login_container_margin_top] class='login-container-margin' value='<?php echo !empty($admin_login['login_container_margin_top']) ? $admin_login['login_container_margin_top'] : ''; ?>' max="500" placeholder="Top" />

                                                                                        <input type='number' name=admin_login_form[login_container_margin_right] class='login-container-margin' value='auto' max="500" placeholder="auto" disabled />

                                                                                        <input type='number' name=admin_login_form[login_container_margin_bottom] class='login-container-margin' value='<?php echo !empty($admin_login['login_container_margin_bottom']) ? $admin_login['login_container_margin_bottom'] : ''; ?>' max="500" placeholder="Bottom" />

                                                                                        <input type='number' name=admin_login_form[login_container_margin_left] class='login-container-margin' value='auto' max="500" placeholder="auto" disabled />

                                                                                        <span>px</span>

                                                                                </div>

                                                                        </div>

                                                                        <div class="cns-login">

                                                                                <div class="cns-label-title">

                                                                                        <label for="background-blur"><?php __('Padding', 'cns-login-master'); ?></label>

                                                                                </div>

                                                                                <div class="login-container-padding-wrapper">

                                                                                        <input type='number' name=admin_login_form[login_container_padding_top] class='login-container-padding' value='<?php echo !empty($admin_login['login_container_padding_top']) ? $admin_login['login_container_padding_top'] : ''; ?>' max="500" placeholder="Top" />

                                                                                        <input type='number' name=admin_login_form[login_container_padding_right] class='login-container-padding' value='<?php echo !empty($admin_login['login_container_padding_right']) ? $admin_login['login_container_padding_right'] : ''; ?>' max="500" placeholder="Right" />

                                                                                        <input type='number' name=admin_login_form[login_container_padding_bottom] class='login-container-padding' value='<?php echo !empty($admin_login['login_container_padding_bottom']) ? $admin_login['login_container_padding_bottom'] : ''; ?>' max="500" placeholder="Bottom" />

                                                                                        <input type='number' name=admin_login_form[login_container_padding_left] class='login-container-padding' value='<?php echo !empty($admin_login['login_container_padding_left']) ? $admin_login['login_container_padding_left'] : ''; ?>' max="500" placeholder="Left" />

                                                                                        <span>px</span>

                                                                                </div>

                                                                        </div>

                                                                        <div class="cns-login">

                                                                                <div class="cns-label-title">

                                                                                        <label for="background-blur"><?php __('Alignment', 'cns-login-master'); ?></label>

                                                                                </div>

                                                                                <div class="login-form-wrapper">

                                                                                        <div class="frm-align">

                                                                                                <label for="Left"><?php __('Left', 'cns-login-master'); ?></label>

                                                                                                <input type='radio' name=admin_login_form[login_form_alignment] class='logi-form-align' value='Left' min="0" max="500" <?php checked(!empty($admin_login['login_form_alignment']) ? $admin_login['login_form_alignment'] : '', 'Left'); ?> />

                                                                                        </div>

                                                                                        <div class="frm-align">

                                                                                                <label for="Center"><?php __('Center', 'cns-login-master'); ?></label>

                                                                                                <input type='radio' name=admin_login_form[login_form_alignment] class='logi-form-align' value='Center' min="0" max="500" <?php checked(!empty($admin_login['login_form_alignment']) ? $admin_login['login_form_alignment'] : '', 'Center'); ?> />

                                                                                        </div>

                                                                                        <div class="frm-align">

                                                                                                <label for="Right"><?php __('Right', 'cns-login-master'); ?></label>

                                                                                                <input type='radio' name=admin_login_form[login_form_alignment] class='logi-form-align' value='Right' min="0" max="500" <?php checked(!empty($admin_login['login_form_alignment']) ? $admin_login['login_form_alignment'] : '', 'Right'); ?> />

                                                                                        </div>

                                                                                </div>

                                                                        </div>

                                                                </fieldset>

                                                        </section>



                                                        <section id="cns-tab-4" class="cns-tab-body entry-content">



                                                                <fieldset>



                                                                        <div class="cns-login">

                                                                                <h2> <?php __('Login Form Settings', 'cns-login-master'); ?></h2>

                                                                                <div class="cns-label-title">

                                                                                        <label for="login-form-color"><?php __('Background Color', 'cns-login-master'); ?></label>

                                                                                </div>

                                                                                <div class="wrapper login-form-color-wrapper">

                                                                                        <input type='color' name=admin_login_form[login_box_bg_color] class='' value='<?php echo !empty($admin_login['login_box_bg_color']) ? $admin_login['login_box_bg_color'] : ''; ?>' />

                                                                                        <?php if (!empty($admin_login['login_box_bg_color'])) { ?><div class="color-code"><?php echo !empty($admin_login['login_box_bg_color']) ? $admin_login['login_box_bg_color'] : ''; ?></div><span class="copied-message"></span><?php } ?>

                                                                                </div>

                                                                        </div>

                                                                        <div class="cns-login">

                                                                                <div class="cns-label-title">

                                                                                        <label for="text-color"><?php __('Text Color', 'cns-login-master'); ?>Text Color</label>

                                                                                </div>

                                                                                <div class="wrapper login-form-text-color-wrapper">

                                                                                        <input type='color' name=admin_login_form[text_color] class='' value='<?php echo !empty($admin_login['text_color']) ? $admin_login['text_color'] : ''; ?>' />

                                                                                        <?php if (!empty($admin_login['text_color'])) { ?><div class="color-code"><?php echo !empty($admin_login['text_color']) ? $admin_login['text_color'] : ''; ?></div><span class="copied-message"></span><?php } ?>

                                                                                </div>

                                                                        </div>

                                                                        <div class="cns-login">

                                                                                <div class="cns-label-title">

                                                                                        <label for="font-size">Font Size</label>

                                                                                </div>

                                                                                <div class="login-form-font-size-wrapper">

                                                                                        <input type='range' name=admin_login_form[font_size] class='font-size' value='<?php echo !empty($admin_login['font_size']) ? $admin_login['font_size'] : 0; ?>' min="0" max="100" />

                                                                                        <label for="" class="font-size-range"><?php echo !empty($admin_login['font_size']) ? $admin_login['font_size'] : 0; ?>px</label>

                                                                                </div>

                                                                        </div>



                                                                        <div class="cns-login">

                                                                                <div class="cns-label-title">

                                                                                        <label for="background-bkur"><?php __('Margin', 'cns-login-master'); ?></label>

                                                                                </div>

                                                                                <div class="login-form-margin-wrapper">

                                                                                        <input type='number' name=admin_login_form[login_form_margin_top] class='login-form-margin' value='<?php echo !empty($admin_login['login_form_margin_top']) ? $admin_login['login_form_margin_top'] : ''; ?>' max="500" placeholder="Top" />

                                                                                        <input type='number' name=admin_login_form[login_form_margin_right] class='login-form-margin' value='<?php echo !empty($admin_login['login_form_margin_right']) ? $admin_login['login_form_margin_right'] : ''; ?>' max="500" placeholder="Right" />

                                                                                        <input type='number' name=admin_login_form[login_form_margin_bottom] class='login-form-margin' value='<?php echo !empty($admin_login['login_form_margin_bottom']) ? $admin_login['login_form_margin_bottom'] : ''; ?>' max="500" placeholder="Bottom" />

                                                                                        <input type='number' name=admin_login_form[login_form_margin_left] class='login-form-margin' value='<?php echo !empty($admin_login['login_form_margin_left']) ? $admin_login['login_form_margin_left'] : ''; ?>' max="500" placeholder="Left" />

                                                                                        <span>px</span>

                                                                                </div>

                                                                        </div>

                                                                        <div class="cns-login">

                                                                                <div class="cns-label-title">

                                                                                        <label for="background-bkur"><?php __('Padding', 'cns-login-master'); ?></label>

                                                                                </div>

                                                                                <div class="login-form-padding-wrapper">

                                                                                        <input type='number' name=admin_login_form[login_form_padding_top] class='login-form-padding' value='<?php echo !empty($admin_login['login_form_padding_top']) ? $admin_login['login_form_padding_top'] : ''; ?>' max="500" placeholder="Top" />

                                                                                        <input type='number' name=admin_login_form[login_form_padding_right] class='login-form-padding' value='<?php echo !empty($admin_login['login_form_padding_right']) ? $admin_login['login_form_padding_right'] : ''; ?>' max="500" placeholder="Right" />

                                                                                        <input type='number' name=admin_login_form[login_form_padding_bottom] class='login-form-padding' value='<?php echo !empty($admin_login['login_form_padding_bottom']) ? $admin_login['login_form_padding_bottom'] : ''; ?>' max="500" placeholder="Bottom" />

                                                                                        <input type='number' name=admin_login_form[login_form_padding_left] class='login-form-padding' value='<?php echo !empty($admin_login['login_form_padding_left']) ? $admin_login['login_form_padding_left'] : ''; ?>' max="500" placeholder="Left" />

                                                                                        <span>px</span>

                                                                                </div>

                                                                        </div>

                                                                </fieldset>

                                                        </section>



                                                        <section id="cns-tab-5" class="cns-tab-body entry-content">



                                                                <fieldset>



                                                                        <div class="cns-login">

                                                                                <h2> <?php __('Message Box Settings', 'cns-login-master'); ?></h2>

                                                                                <div class="cns-label-title">

                                                                                        <label for="lalert-box-bg-color"><?php __('Background Color', 'cns-login-master'); ?></label>

                                                                                </div>

                                                                                <div class="wrapper message-box-bg-color-wrapper">

                                                                                        <input type='color' name=admin_login_form[alert_box_bg_color] class='' value='<?php echo !empty($admin_login['alert_box_bg_color']) ? $admin_login['alert_box_bg_color'] : ''; ?>' />

                                                                                        <?php if (!empty($admin_login['alert_box_bg_color'])) { ?><div class="color-code"><?php echo !empty($admin_login['alert_box_bg_color']) ? $admin_login['alert_box_bg_color'] : ''; ?></div><span class="copied-message"></span><?php } ?>

                                                                                </div>

                                                                        </div>

                                                                        <div class="cns-login">

                                                                                <div class="cns-label-title">

                                                                                        <label for="alert-box-text-color"><?php __('Text Color', 'cns-login-master'); ?></label>

                                                                                </div>

                                                                                <div class="wrapper message-box-text-color-wrapper">

                                                                                        <input type='color' name=admin_login_form[alert_box_text_color] class='' value='<?php echo !empty($admin_login['alert_box_text_color']) ? $admin_login['alert_box_text_color'] : ''; ?>' />

                                                                                        <?php if (!empty($admin_login['alert_box_text_color'])) { ?><div class="color-code"><?php echo !empty($admin_login['alert_box_text_color']) ? $admin_login['alert_box_text_color'] : ''; ?></div><span class="copied-message"></span><?php } ?>

                                                                                </div>

                                                                        </div>

                                                                        <div class="cns-login">

                                                                                <div class="cns-label-title">

                                                                                        <label for="background-bkur"><?php __('Width', 'cns-login-master'); ?></label>

                                                                                </div>

                                                                                <div class="message-box-width-wrapper">

                                                                                        <input type='range' name=admin_login_form[message_box_width] class='message-box-width' value='<?php echo !empty($admin_login['message_box_width']) ? $admin_login['message_box_width'] : 0; ?>' min="0" max="100" />

                                                                                        <label for="" class="message-box-width-range"><?php echo !empty($admin_login['message_box_width']) ? $admin_login['message_box_width'] : 0; ?>%</label>

                                                                                </div>

                                                                        </div>



                                                                        <div class="cns-login">

                                                                                <div class="cns-label-title">

                                                                                        <label for="background-bkur"><?php __('Margin', 'cns-login-master'); ?></label>

                                                                                </div>

                                                                                <div class="message-box-margin-wrapper">

                                                                                        <input type='number' name=admin_login_form[message_box_margin_top] class='message-box-margin' value='<?php echo !empty($admin_login['message_box_margin_top']) ? $admin_login['message_box_margin_top'] : ''; ?>' min="0" max="500" placeholder="Top" />

                                                                                        <input type='number' name=admin_login_form[message_box_margin_right] class='message-box-margin' value='<?php echo !empty($admin_login['message_box_margin_right']) ? $admin_login['message_box_margin_right'] : ''; ?>' min="0" max="500" placeholder="Right" />

                                                                                        <input type='number' name=admin_login_form[message_box_margin_bottom] class='message-box-margin' value='<?php echo !empty($admin_login['message_box_margin_bottom']) ? $admin_login['message_box_margin_bottom'] : ''; ?>' min="0" max="500" placeholder="Bottom" />

                                                                                        <input type='number' name=admin_login_form[message_box_margin_left] class='message-box-margin' value='<?php echo !empty($admin_login['message_box_margin_left']) ? $admin_login['message_box_margin_left'] : ''; ?>' min="0" max="500" placeholder="Left" />

                                                                                        <span>px</span>

                                                                                </div>

                                                                        </div>

                                                                        <div class="cns-login">

                                                                                <div class="cns-label-title">

                                                                                        <label for="background-bkur"><?php __('Padding', 'cns-login-master'); ?></label>

                                                                                </div>

                                                                                <div class="message-box-padding-wrapper">

                                                                                        <input type='number' name=admin_login_form[message_box_padding_top] class='message-box-padding' value='<?php echo !empty($admin_login['message_box_padding_top']) ? $admin_login['message_box_padding_top'] : ''; ?>' min="0" max="500" placeholder="Top" />

                                                                                        <input type='number' name=admin_login_form[message_box_padding_right] class='message-box-padding' value='<?php echo !empty($admin_login['message_box_padding_right']) ? $admin_login['message_box_padding_right'] : ''; ?>' min="0" max="500" placeholder="Right" />

                                                                                        <input type='number' name=admin_login_form[message_box_padding_bottom] class='message-box-padding' value='<?php echo !empty($admin_login['message_box_padding_bottom']) ? $admin_login['message_box_padding_bottom'] : ''; ?>' min="0" max="500" placeholder="Bottom" />

                                                                                        <input type='number' name=admin_login_form[message_box_padding_left] class='message-box-padding' value='<?php echo !empty($admin_login['message_box_padding_left']) ? $admin_login['message_box_padding_left'] : ''; ?>' min="0" max="500" placeholder="Left" />

                                                                                        <span>px</span>

                                                                                </div>

                                                                        </div>



                                                                </fieldset>

                                                        </section>



                                                        <section id="cns-tab-6" class="cns-tab-body entry-content">



                                                                <fieldset class="background-text-settings">



                                                                        <div class="cns-login">

                                                                                <h2> <?php __('Link Settings', 'cns-login-master'); ?></h2>

                                                                                <div class="cns-label-title">

                                                                                        <label for="link-font-size"><?php __('Font Size', 'cns-login-master'); ?></label>

                                                                                </div>

                                                                                <div class="link-font-size-wrapper">

                                                                                        <input type='range' name=admin_login_form[link_font_size] class='link-font-size' value='<?php echo !empty($admin_login['link_font_size']) ? $admin_login['link_font_size'] : 0; ?>' min="0" max="100" />

                                                                                        <label for="" class="link-font-size-range"><?php echo !empty($admin_login['link_font_size']) ? $admin_login['link_font_size'] : 0; ?>px</label>

                                                                                </div>

                                                                        </div>

                                                                        <div class="cns-login">

                                                                                <div class="cns-label-title">

                                                                                        <label for="link-text-color"><?php __('Link Text Color', 'cns-login-master'); ?></label>

                                                                                </div>

                                                                                <div class="wrapper link-text-color-wrapper">

                                                                                        <input type='color' name=admin_login_form[link_text_color] class='' value='<?php echo !empty($admin_login['link_text_color']) ? $admin_login['link_text_color'] : ''; ?>' />

                                                                                        <?php if (!empty($admin_login['link_text_color'])) { ?><div class="color-code"><?php echo !empty($admin_login['link_text_color']) ? $admin_login['link_text_color'] : ''; ?></div><span class="copied-message"></span><?php } ?>

                                                                                </div>

                                                                        </div>

                                                                </fieldset>

                                                        </section>



                                                        <section id="cns-tab-7" class="cns-tab-body entry-content">

                                                                <fieldset class="background-text-settings">



                                                                        <div class="cns-login">

                                                                                <h2> <?php __('Login Button Settings', 'cns-login-master'); ?></h2>

                                                                                <div class="cns-label-title">

                                                                                        <label for="login-btn-bg-color"><?php __('Background Color', 'cns-login-master'); ?></label>

                                                                                </div>

                                                                                <div class="wrapper login-btn-bg-color-wrapper">

                                                                                        <input type='color' name=admin_login_form[login_btn_bg_color] class='cns-login-btn-bg-color' value='<?php echo !empty($admin_login['login_btn_bg_color']) ? $admin_login['login_btn_bg_color'] : ''; ?>' />

                                                                                        <?php if (!empty($admin_login['login_btn_bg_color'])) { ?><div class="color-code"><?php echo !empty($admin_login['login_btn_bg_color']) ? $admin_login['login_btn_bg_color'] : ''; ?></div><span class="copied-message"></span><?php } ?>

                                                                                </div>

                                                                        </div>

                                                                        <div class="cns-login">

                                                                                <div class="cns-label-title">

                                                                                        <label for="login-btn-color"><?php __('Color', 'cns-login-master'); ?></label>

                                                                                </div>

                                                                                <div class="login-btn-color-wrapper">

                                                                                        <input type='color' name=admin_login_form[login_btn_color] class='cns-login-btn-text-color' value='<?php echo !empty($admin_login['login_btn_color']) ? $admin_login['login_btn_color'] : ''; ?>' />

                                                                                        <?php if (!empty($admin_login['login_btn_color'])) { ?><div class="color-code"><?php echo !empty($admin_login['login_btn_color']) ? $admin_login['login_btn_color'] : ''; ?></div><span class="copied-message"></span><?php } ?>

                                                                                </div>

                                                                        </div>

                                                                        <div class="cns-login">

                                                                                <div class="cns-label-title">

                                                                                        <label for="login-btn"><?php __('Font Size', 'cns-login-master'); ?></label>

                                                                                </div>

                                                                                <div class="login-btn-font-size-wrapper">

                                                                                        <input type='range' name=admin_login_form[link_font_size] class='login-btn-font-size' value='<?php echo !empty($admin_login['link_font_size']) ? $admin_login['link_font_size'] : 0; ?>' min="0" max="100" />

                                                                                        <label for="" class="login-btn-font-size-range"><?php echo !empty($admin_login['link_font_size']) ? $admin_login['link_font_size'] : 0; ?>px</label>

                                                                                </div>

                                                                        </div>

                                                                        <div class="cns-login">

                                                                                <div class="cns-label-title">

                                                                                        <label for="background-bkur"><?php __('Margin', 'cns-login-master'); ?></label>

                                                                                </div>

                                                                                <div class="login-btn-margin-wrapper">

                                                                                        <input type='number' name=admin_login_form[login_btn_margin_top] class='login-btn-margin' value='<?php echo !empty($admin_login['login_btn_margin_top']) ? $admin_login['login_btn_margin_top'] : ''; ?>' min="0" max="500" placeholder="Top" />

                                                                                        <input type='number' name=admin_login_form[login_btn_margin_right] class='login-btn-margin' value='<?php echo !empty($admin_login['login_btn_margin_right']) ? $admin_login['login_btn_margin_right'] : ''; ?>' min="0" max="500" placeholder="Right" />

                                                                                        <input type='number' name=admin_login_form[login_btn_margin_bottom] class='login-btn-margin' value='<?php echo !empty($admin_login['login_btn_margin_bottom']) ? $admin_login['login_btn_margin_bottom'] : ''; ?>' min="0" max="500" placeholder="Bottom" />

                                                                                        <input type='number' name=admin_login_form[login_btn_margin_left] class='login-btn-margin' value='<?php echo !empty($admin_login['login_btn_margin_left']) ? $admin_login['login_btn_margin_left'] : ''; ?>' min="0" max="500" placeholder="Left" />

                                                                                        <span>px</span>

                                                                                </div>

                                                                        </div>

                                                                        <div class="cns-login">

                                                                                <div class="cns-label-title">

                                                                                        <label for="background-bkur"><?php __('Padding', 'cns-login-master'); ?></label>

                                                                                </div>

                                                                                <div class="logi-btn-padding-wrapper">

                                                                                        <input type='number' name=admin_login_form[login_btn_padding_top] class='logi-btn-padding' value='<?php echo !empty($admin_login['login_btn_padding_top']) ? $admin_login['login_btn_padding_top'] : ''; ?>' min="0" max="500" placeholder="Top" />

                                                                                        <input type='number' name=admin_login_form[login_btn_padding_right] class='logi-btn-padding' value='<?php echo !empty($admin_login['login_btn_padding_right']) ? $admin_login['login_btn_padding_right'] : ''; ?>' min="0" max="500" placeholder="Right" />

                                                                                        <input type='number' name=admin_login_form[login_btn_padding_bottom] class='logi-btn-padding' value='<?php echo !empty($admin_login['login_btn_padding_bottom']) ? $admin_login['login_btn_padding_bottom'] : ''; ?>' min="0" max="500" placeholder="Bottom" />

                                                                                        <input type='number' name=admin_login_form[login_btn_padding_left] class='logi-btn-padding' value='<?php echo !empty($admin_login['login_btn_padding_left']) ? $admin_login['login_btn_padding_left'] : ''; ?>' min="0" max="500" placeholder="Left" />

                                                                                        <span>px</span>

                                                                                </div>

                                                                        </div>

                                                                </fieldset>

                                                        </section>

                                                </div>

                                        </div>

                                </div>

                        </div>

                </section>

        </div>















<?php }
