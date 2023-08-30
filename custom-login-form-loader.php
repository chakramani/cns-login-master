<?php
function wl_admin_login_page_enqueue()
{
        $screen = get_current_screen();

        // Check screen base and page
        if ('toplevel_page_wl_login_master' === $screen->base && $_GET['page'] === 'wl_login_master') {
                wp_enqueue_style('wl_admin_login_form_css_admin', plugin_dir_url(__FILE__) . '/style.css');

                wp_enqueue_media();
                wp_enqueue_script('wl_admin_login_form_js_admin', plugin_dir_url(__FILE__) . 'main.js');
        }
}
add_action('admin_enqueue_scripts', 'wl_admin_login_page_enqueue');


add_action('admin_menu', 'wl_custom_admin_login_form');
function wl_custom_admin_login_form()
{
        $wl_icon = plugin_dir_url(__FILE__) . '/assets/images/wl-dashicon.png';
        add_menu_page('WL Login Master', 'WL Login Master', 'manage_options', 'wl_login_master', 'wl_custom_login_page', $wl_icon);
}
function wl_custom_login_page()
{ ?>
        <div class="wl-header">
                <img src="<?php echo plugin_dir_url(__FILE__) . '/assets/images/wl-logo.svg' ?>" alt="White Label" class="wl-logo" width="200">
        </div>
        <form method="post" action="options.php" id="wl-form">
                <fieldset>
                        <?php
                        settings_fields('login-form-setting-group');
                        do_settings_sections('login-form-setting');
                        submit_button(); ?>
                        <p class="whitelabel-copyright">Made with <span>&hearts;</span> by <a href="https://whitelabelwp.io/">WhiteLabel</a></p>
                </fieldset>
        </form>
<?php }





function wl_settings_fields()
{
        add_settings_section('general-section', '', 'wl_admin_login_logo', 'login-form-setting');

        register_setting('login-form-setting-group', 'admin_login_form');
}
add_action('admin_init', 'wl_settings_fields');


function wl_admin_login_logo()
{
        $admin_login = get_option('admin_login_form');  ?>
        <fieldset>
                <legend><span class="number">1</span> <?php _e('Logo Settings', 'wl-login-master'); ?></legend>
                <div class="wl-login">

                        <div class="wl-label-title">
                                <input type='hidden' id='admin_login_logo_hidden' name=admin_login_form[logo] value='<?php echo !empty($admin_login['logo']) ? $admin_login['logo'] : ''; ?>' />
                                <label for="logo"><?php _e('Logo', 'wl-login-master'); ?></label>
                        </div>
                        <div class="wl-upload-box">
                                <div class="wl-upload-btn-box">
                                        <?php if (empty($admin_login['logo'])) { ?>
                                                <label class="wl-upload-btn-label pre-upload-logo">
                                                        <input type='button' class='wl-upload-btn' value='Upload Logo' id='admin_login_logo' />
                                                </label>
                                        <?php } else { ?>
                                                <div class="wl-img-upload mainlogo">
                                                        <div class="avatar-edit">
                                                                <input type='button' class='wl-upload-btn' value='Upload Image' />
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
                <div class="wl-login">
                        <div class="wl-label-title">
                                <label for="background-bkur"><?php _e('Logo width', 'wl-login-master'); ?></label>
                        </div>
                        <div class="logo-width-wrapper">
                                <input type='range' name=admin_login_form[logo_width] class='logo-width' value='<?php echo !empty($admin_login['logo_width']) ? $admin_login['logo_width'] : 0; ?>' min="0" max="200" />
                                <label for="" class="logo-width-range"><?php echo !empty($admin_login['logo_width']) ? $admin_login['logo_width'] : 0; ?>px</label>
                        </div>
                </div>
                <div class="wl-login">
                        <div class="wl-label-title">
                                <label for="background-bkur"><?php _e('Logo height', 'wl-login-master'); ?></label>
                        </div>
                        <div class="logo-height-wrapper">
                                <input type='range' name=admin_login_form[logo_height] class='logo-height' value='<?php echo !empty($admin_login['logo_height']) ? $admin_login['logo_height'] : 0; ?>' min="0" max="200" />
                                <label for="" class="logo-height-range"><?php echo !empty($admin_login['logo_height']) ? $admin_login['logo_height'] : 0; ?>px</label>
                        </div>
                </div>
        </fieldset>
        <fieldset class="wl-background-settings">
                <legend><span class="number">2</span> <?php _e('Body Background Settings', 'wl-login-master'); ?></legend>
                <div class="wl-login">

                        <div class="wl-label-title">
                                <input type='hidden' id='admin_login_bg_image_hidden' name=admin_login_form[bg_image] value='<?php echo !empty($admin_login['bg_image']) ? $admin_login['bg_image'] : ''; ?>' />
                                <label for="background-image"><?php _e('Background Image', 'wl-login-master'); ?></label>
                        </div>
                        <div class="wl-upload-box">
                                <div class="wl-upload-btn-box">
                                        <?php if (empty($admin_login['bg_image'])) { ?>
                                                <label class="wl-upload-btn-label pre-upload-bg-image">
                                                        <input type='button' class='wl-upload-btn ' value='Upload Image' id='admin_login_background_imge' />
                                                </label>
                                        <?php } else { ?>
                                                <div class="wl-img-upload">
                                                        <div class="avatar-edit">
                                                                <input type='button' class='wl-upload-btn' value='Upload Image' />
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
                <div class="wl-login">
                        <div class="wl-label-title">
                                <label for="background-color"><?php _e('Background Color', 'wl-login-master'); ?></label>
                        </div>
                        <div class="wrapper login-form-bg-color-wrapper">
                                <input type='color' name=admin_login_form[bg_color] class='' value='<?php echo !empty($admin_login['bg_color']) ? $admin_login['bg_color'] : ''; ?>' />
                                <?php if (!empty($admin_login['bg_color'])) { ?><div class="color-code" tooltip="Slide to the left" flow="left"><?php echo !empty($admin_login['bg_color']) ? $admin_login['bg_color'] : ''; ?></div><span class="copied-message"></span><?php } ?>
                        </div>
                </div>
                <div class="wl-login">
                        <div class="wl-label-title">
                                <label for="background-bkur"><?php _e('Background Blur', 'wl-login-master'); ?></label>
                        </div>
                        <div class="body-bg-image-blur-wrapper">
                                <input type='range' name=admin_login_form[bg_blur] class='bg-blur' value='<?php echo !empty($admin_login['bg_blur']) ? $admin_login['bg_blur'] : 0; ?>' min="0" max="100" />
                                <label for="" class="bg-blur-range"><?php echo !empty($admin_login['bg_blur']) ? $admin_login['bg_blur'] : 0; ?>px</label>
                        </div>
                </div>
                <div class="wl-login">
                        <div class="wl-label-title">
                                <label for="background-bkur"><?php _e('Background Repeat', 'wl-login-master'); ?></label>
                        </div>
                        <div class="body-bg-image-repeat-wrapper">
                                <select name="admin_login_form[bg_repeat]" class="bg-repeat">
                                        <option value="inherit" <?php selected(!empty($admin_login['bg_repeat']) ? $admin_login['bg_repeat'] : '', 'inherit'); ?>><?php _e('Inherit', 'wl-login-master'); ?></option>
                                        <option value="initital" <?php selected(!empty($admin_login['bg_repeat']) ? $admin_login['bg_repeat'] : '', 'initital'); ?>><?php _e('Initital', 'wl-login-master'); ?></option>
                                        <option value="no-repeat" <?php selected(!empty($admin_login['bg_repeat']) ? $admin_login['bg_repeat'] : '', 'no-repeat'); ?>><?php _e('No-repeat', 'wl-login-master'); ?></option>
                                        <option value="repeat" <?php selected(!empty($admin_login['bg_repeat']) ? $admin_login['bg_repeat'] : '', 'repeat'); ?>><?php _e('Repeat', 'wl-login-master'); ?></option>
                                        <option value="repeat-x" <?php selected(!empty($admin_login['bg_repeat']) ? $admin_login['bg_repeat'] : '', 'repeat-x'); ?>><?php _e('Repeat-x', 'wl-login-master'); ?></option>
                                        <option value="repeat-y" <?php selected(!empty($admin_login['bg_repeat']) ? $admin_login['bg_repeat'] : '', 'repeat-y'); ?>><?php _e('Repeat-y', 'wl-login-master'); ?></option>
                                        <option value="revert" <?php selected(!empty($admin_login['bg_repeat']) ? $admin_login['bg_repeat'] : '', 'revert'); ?>><?php _e('Revert', 'wl-login-master'); ?></option>
                                        <option value="round" <?php selected(!empty($admin_login['bg_repeat']) ? $admin_login['bg_repeat'] : '', 'round'); ?>><?php _e('Round', 'wl-login-master'); ?></option>
                                        <option value="space" <?php selected(!empty($admin_login['bg_repeat']) ? $admin_login['bg_repeat'] : '', 'space'); ?>><?php _e('Space', 'wl-login-master'); ?></option>
                                        <option value="unset" <?php selected(!empty($admin_login['bg_repeat']) ? $admin_login['bg_repeat'] : '', 'unset'); ?>><?php _e('Unset', 'wl-login-master'); ?></option>
                                </select>
                        </div>
                </div>
                <div class="wl-login">
                        <div class="wl-label-title">
                                <label for="background-bkur"><?php _e('Background Size', 'wl-login-master'); ?></label>
                        </div>
                        <div class="body-bg-image-size-wrapper">
                                <select name="admin_login_form[bg_size]" class="bg-size">
                                        <option value="auto" <?php selected(!empty($admin_login['bg_size']) ? $admin_login['bg_size'] : '', 'auto'); ?>><?php _e('Auto', 'wl-login-master'); ?></option>
                                        <option value="contain" <?php selected(!empty($admin_login['bg_size']) ? $admin_login['bg_size'] : '', 'contain'); ?>><?php _e('Contain', 'wl-login-master'); ?></option>
                                        <option value="cover" <?php selected(!empty($admin_login['bg_size']) ? $admin_login['bg_size'] : '', 'cover'); ?>><?php _e('Cover', 'wl-login-master'); ?></option>
                                        <option value="inherit" <?php selected(!empty($admin_login['bg_size']) ? $admin_login['bg_size'] : '', 'inherit'); ?>><?php _e('Inherit', 'wl-login-master'); ?></option>
                                        <option value="initital" <?php selected(!empty($admin_login['bg_size']) ? $admin_login['bg_size'] : '', 'initital'); ?>><?php _e('Initital', 'wl-login-master'); ?></option>
                                        <option value="revert" <?php selected(!empty($admin_login['bg_size']) ? $admin_login['bg_size'] : '', 'revert'); ?>><?php _e('Revert', 'wl-login-master'); ?></option>
                                        <option value="unset" <?php selected(!empty($admin_login['bg_size']) ? $admin_login['bg_size'] : '', 'unset'); ?>><?php _e('Unset', 'wl-login-master'); ?></option>
                                </select>
                        </div>
                </div>


        </fieldset>
        <fieldset>
                <legend><span class="number">3</span> <?php _e('Form Container Settings', 'wl-login-master'); ?></legend>
                <div class="wl-login">
                        <div class="wl-label-title">
                                <label for="background-bkur"><?php _e('Container Width', 'wl-login-master'); ?></label>
                        </div>
                        <div class="login-form-container-width-wrapper">
                                <input type='range' name=admin_login_form[login_form_container_width] class='form-container-width' value='<?php echo !empty($admin_login['login_form_container_width']) ? $admin_login['login_form_container_width'] : 0; ?>' min="0" max="1000" />
                                <label for="" class="form-container-width-range"><?php echo !empty($admin_login['login_form_container_width']) ? $admin_login['login_form_container_width'] : 0; ?>px</label>
                        </div>
                </div>
                <!-- <div class="wl-login">
                        <div class="wl-label-title">
                                <label for="background-bkur">Container Height</label>
                        </div>
                        <div class="login-form-container-height-wrapper">
                                <input type='range' name=admin_login_form[login_form_container_height] class='form-container-height' value='<?php //echo !empty($admin_login['login_form_container_height']) ? $admin_login['login_form_container_height'] : ''; 
                                                                                                                                                ?>' min="0" max="1000" />
                                <label for="" class="form-container-height-range"><?php //echo !empty($admin_login['login_form_container_height']) ? $admin_login['login_form_container_height'] : ''; 
                                                                                        ?>px</label>
                        </div>
                </div> -->
                <div class="wl-login">
                        <div class="wl-label-title">
                                <label for="background-bkur"><?php _e('Margin', 'wl-login-master'); ?></label>
                        </div>
                        <div class="login-container-margin-wrapper">
                                <input type='number' name=admin_login_form[login_container_margin_top] class='login-container-margin' value='<?php echo !empty($admin_login['login_container_margin_top']) ? $admin_login['login_container_margin_top'] : ''; ?>' max="500" placeholder="Top" />
                                <input type='number' name=admin_login_form[login_container_margin_right] class='login-container-margin' value='auto' max="500" placeholder="auto" disabled />
                                <input type='number' name=admin_login_form[login_container_margin_bottom] class='login-container-margin' value='<?php echo !empty($admin_login['login_container_margin_bottom']) ? $admin_login['login_container_margin_bottom'] : ''; ?>' max="500" placeholder="Bottom" />
                                <input type='number' name=admin_login_form[login_container_margin_left] class='login-container-margin' value='auto' max="500" placeholder="auto" disabled />
                                <span>px</span>
                        </div>
                </div>
                <div class="wl-login">
                        <div class="wl-label-title">
                                <label for="background-bkur"><?php _e('Padding', 'wl-login-master'); ?></label>
                        </div>
                        <div class="login-container-padding-wrapper">
                                <input type='number' name=admin_login_form[login_container_padding_top] class='login-container-padding' value='<?php echo !empty($admin_login['login_container_padding_top']) ? $admin_login['login_container_padding_top'] : ''; ?>' max="500" placeholder="Top" />
                                <input type='number' name=admin_login_form[login_container_padding_right] class='login-container-padding' value='<?php echo !empty($admin_login['login_container_padding_right']) ? $admin_login['login_container_padding_right'] : ''; ?>' max="500" placeholder="Right" />
                                <input type='number' name=admin_login_form[login_container_padding_bottom] class='login-container-padding' value='<?php echo !empty($admin_login['login_container_padding_bottom']) ? $admin_login['login_container_padding_bottom'] : ''; ?>' max="500" placeholder="Bottom" />
                                <input type='number' name=admin_login_form[login_container_padding_left] class='login-container-padding' value='<?php echo !empty($admin_login['login_container_padding_left']) ? $admin_login['login_container_padding_left'] : ''; ?>' max="500" placeholder="Left" />
                                <span>px</span>
                        </div>
                </div>
        </fieldset>
        <fieldset>
                <legend><span class="number">4</span> <?php _e('Login Form Settings', 'wl-login-master'); ?></legend>
                <div class="wl-login">
                        <div class="wl-label-title">
                                <label for="login-form-color"><?php _e('Background Color', 'wl-login-master'); ?></label>
                        </div>
                        <div class="wrapper login-form-color-wrapper">
                                <input type='color' name=admin_login_form[login_box_bg_color] class='' value='<?php echo !empty($admin_login['login_box_bg_color']) ? $admin_login['login_box_bg_color'] : ''; ?>' />
                                <?php if (!empty($admin_login['login_box_bg_color'])) { ?><div class="color-code"><?php echo !empty($admin_login['login_box_bg_color']) ? $admin_login['login_box_bg_color'] : ''; ?></div><span class="copied-message"></span><?php } ?>
                        </div>
                </div>
                <div class="wl-login">
                        <div class="wl-label-title">
                                <label for="text-color"><?php _e('Text Color', 'wl-login-master'); ?>Text Color</label>
                        </div>
                        <div class="wrapper login-form-text-color-wrapper">
                                <input type='color' name=admin_login_form[text_color] class='' value='<?php echo !empty($admin_login['text_color']) ? $admin_login['text_color'] : ''; ?>' />
                                <?php if (!empty($admin_login['text_color'])) { ?><div class="color-code"><?php echo !empty($admin_login['text_color']) ? $admin_login['text_color'] : ''; ?></div><span class="copied-message"></span><?php } ?>
                        </div>
                </div>
                <div class="wl-login">
                        <div class="wl-label-title">
                                <label for="font-size">Font Size</label>
                        </div>
                        <div class="login-form-font-size-wrapper">
                                <input type='range' name=admin_login_form[font_size] class='font-size' value='<?php echo !empty($admin_login['font_size']) ? $admin_login['font_size'] : 0; ?>' min="0" max="100" />
                                <label for="" class="font-size-range"><?php echo !empty($admin_login['font_size']) ? $admin_login['font_size'] : 0; ?>px</label>
                        </div>
                </div>

                <!-- <div class="wl-login">
                        <div class="wl-label-title">
                                <label for="background-bkur">Width</label>
                        </div>
                        <div class="login-form-width-wrapper">
                                <input type='range' name=admin_login_form[login_form_width] class='login-form-width' value='<?php //echo !empty($admin_login['login_form_width']) ? $admin_login['login_form_width'] : ''; 
                                                                                                                                ?>' min="0" max="100" />
                                <label for="" class="login-form-width-range"><?php //echo !empty($admin_login['login_form_width']) ? $admin_login['login_form_width'] : ''; 
                                                                                ?>%</label>
                        </div>
                </div> -->
                <!-- <div class="wl-login">
                        <div class="wl-label-title">
                                <label for="background-bkur">Height</label>
                        </div>
                        <div class="login-form-height-wrapper">
                                <input type='range' name=admin_login_form[login_form_height] class='login-form-height' value='<?php //echo !empty($admin_login['login_form_height']) ? $admin_login['login_form_height'] : ''; 
                                                                                                                                ?>' min="0" max="100" />
                                <label for="" class="login-form-height-range"><?php //echo !empty($admin_login['login_form_height']) ? $admin_login['login_form_height'] : ''; 
                                                                                ?>%</label>
                        </div>
                </div> -->
                <div class="wl-login">
                        <div class="wl-label-title">
                                <label for="background-bkur"><?php _e('Margin', 'wl-login-master'); ?></label>
                        </div>
                        <div class="login-form-margin-wrapper">
                                <input type='number' name=admin_login_form[login_form_margin_top] class='login-form-margin' value='<?php echo !empty($admin_login['login_form_margin_top']) ? $admin_login['login_form_margin_top'] : ''; ?>' max="500" placeholder="Top" />
                                <input type='number' name=admin_login_form[login_form_margin_right] class='login-form-margin' value='<?php echo !empty($admin_login['login_form_margin_right']) ? $admin_login['login_form_margin_right'] : ''; ?>' max="500" placeholder="Right" />
                                <input type='number' name=admin_login_form[login_form_margin_bottom] class='login-form-margin' value='<?php echo !empty($admin_login['login_form_margin_bottom']) ? $admin_login['login_form_margin_bottom'] : ''; ?>' max="500" placeholder="Bottom" />
                                <input type='number' name=admin_login_form[login_form_margin_left] class='login-form-margin' value='<?php echo !empty($admin_login['login_form_margin_left']) ? $admin_login['login_form_margin_left'] : ''; ?>' max="500" placeholder="Left" />
                                <span>px</span>
                        </div>
                </div>
                <div class="wl-login">
                        <div class="wl-label-title">
                                <label for="background-bkur"><?php _e('Padding', 'wl-login-master'); ?></label>
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
        <fieldset>
                <legend><span class="number">5</span> <?php _e('Message Box Settings', 'wl-login-master'); ?></legend>
                <div class="wl-login">
                        <div class="wl-label-title">
                                <label for="lalert-box-bg-color"><?php _e('Background Color', 'wl-login-master'); ?></label>
                        </div>
                        <div class="wrapper message-box-bg-color-wrapper">
                                <input type='color' name=admin_login_form[alert_box_bg_color] class='' value='<?php echo !empty($admin_login['alert_box_bg_color']) ? $admin_login['alert_box_bg_color'] : ''; ?>' />
                                <?php if (!empty($admin_login['alert_box_bg_color'])) { ?><div class="color-code"><?php echo !empty($admin_login['alert_box_bg_color']) ? $admin_login['alert_box_bg_color'] : ''; ?></div><span class="copied-message"></span><?php } ?>
                        </div>
                </div>
                <div class="wl-login">
                        <div class="wl-label-title">
                                <label for="alert-box-text-color"><?php _e('Text Color', 'wl-login-master'); ?></label>
                        </div>
                        <div class="wrapper message-box-text-color-wrapper">
                                <input type='color' name=admin_login_form[alert_box_text_color] class='' value='<?php echo !empty($admin_login['alert_box_text_color']) ? $admin_login['alert_box_text_color'] : ''; ?>' />
                                <?php if (!empty($admin_login['alert_box_text_color'])) { ?><div class="color-code"><?php echo !empty($admin_login['alert_box_text_color']) ? $admin_login['alert_box_text_color'] : ''; ?></div><span class="copied-message"></span><?php } ?>
                        </div>
                </div>
                <div class="wl-login">
                        <div class="wl-label-title">
                                <label for="background-bkur"><?php _e('Width', 'wl-login-master'); ?></label>
                        </div>
                        <div class="message-box-width-wrapper">
                                <input type='range' name=admin_login_form[message_box_width] class='message-box-width' value='<?php echo !empty($admin_login['message_box_width']) ? $admin_login['message_box_width'] : 0; ?>' min="0" max="100" />
                                <label for="" class="message-box-width-range"><?php echo !empty($admin_login['message_box_width']) ? $admin_login['message_box_width'] : 0; ?>%</label>
                        </div>
                </div>
                <!-- <div class="wl-login">
                        <div class="wl-label-title">
                                <label for="background-bkur">Height</label>
                        </div>
                        <div class="message-box-height-wrapper">
                                <input type='range' name=admin_login_form[message_box_height] class='message-box-height' value='<?php //echo !empty($admin_login['message_box_height']) ? $admin_login['message_box_height'] : ''; 
                                                                                                                                ?>' min="0" max="100" />
                                <label for="" class="message-box-height-range"><?php //echo !empty($admin_login['message_box_height']) ? $admin_login['message_box_height'] : ''; 
                                                                                ?>%</label>
                        </div>
                </div> -->
                <div class="wl-login">
                        <div class="wl-label-title">
                                <label for="background-bkur"><?php _e('Margin', 'wl-login-master'); ?></label>
                        </div>
                        <div class="message-box-margin-wrapper">
                                <input type='number' name=admin_login_form[message_box_margin_top] class='message-box-margin' value='<?php echo !empty($admin_login['message_box_margin_top']) ? $admin_login['message_box_margin_top'] : ''; ?>' min="0" max="500" placeholder="Top" />
                                <input type='number' name=admin_login_form[message_box_margin_right] class='message-box-margin' value='<?php echo !empty($admin_login['message_box_margin_right']) ? $admin_login['message_box_margin_right'] : ''; ?>' min="0" max="500" placeholder="Right" />
                                <input type='number' name=admin_login_form[message_box_margin_bottom] class='message-box-margin' value='<?php echo !empty($admin_login['message_box_margin_bottom']) ? $admin_login['message_box_margin_bottom'] : ''; ?>' min="0" max="500" placeholder="Bottom" />
                                <input type='number' name=admin_login_form[message_box_margin_left] class='message-box-margin' value='<?php echo !empty($admin_login['message_box_margin_left']) ? $admin_login['message_box_margin_left'] : ''; ?>' min="0" max="500" placeholder="Left" />
                                <span>px</span>
                        </div>
                </div>
                <div class="wl-login">
                        <div class="wl-label-title">
                                <label for="background-bkur"><?php _e('Padding', 'wl-login-master'); ?></label>
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
        <fieldset class="background-text-settings">
                <legend><span class="number">6</span> <?php _e('Link Settings', 'wl-login-master'); ?></legend>
                <div class="wl-login">
                        <div class="wl-label-title">
                                <label for="link-font-size"><?php _e('Font Size', 'wl-login-master'); ?></label>
                        </div>
                        <div class="link-font-size-wrapper">
                                <input type='range' name=admin_login_form[link_font_size] class='link-font-size' value='<?php echo !empty($admin_login['link_font_size']) ? $admin_login['link_font_size'] : 0; ?>' min="0" max="100" />
                                <label for="" class="link-font-size-range"><?php echo !empty($admin_login['link_font_size']) ? $admin_login['link_font_size'] : 0; ?>px</label>
                        </div>
                </div>
                <div class="wl-login">
                        <div class="wl-label-title">
                                <label for="link-text-color"><?php _e('Link Text Color', 'wl-login-master'); ?></label>
                        </div>
                        <div class="wrapper link-text-color-wrapper">
                                <input type='color' name=admin_login_form[link_text_color] class='' value='<?php echo !empty($admin_login['link_text_color']) ? $admin_login['link_text_color'] : ''; ?>' />
                                <?php if (!empty($admin_login['link_text_color'])) { ?><div class="color-code"><?php echo !empty($admin_login['link_text_color']) ? $admin_login['link_text_color'] : ''; ?></div><span class="copied-message"></span><?php } ?>
                        </div>
                </div>
        </fieldset>
        <fieldset class="background-text-settings">
                <legend><span class="number">7</span> <?php _e('Login Button Settings', 'wl-login-master'); ?></legend>
                <div class="wl-login">
                        <div class="wl-label-title">
                                <label for="login-btn-bg-color"><?php _e('Background Color', 'wl-login-master'); ?></label>
                        </div>
                        <div class="wrapper login-btn-bg-color-wrapper">
                                <input type='color' name=admin_login_form[login_btn_bg_color] class='wl-login-btn-bg-color' value='<?php echo !empty($admin_login['login_btn_bg_color']) ? $admin_login['login_btn_bg_color'] : ''; ?>' />
                                <?php if (!empty($admin_login['login_btn_bg_color'])) { ?><div class="color-code"><?php echo !empty($admin_login['login_btn_bg_color']) ? $admin_login['login_btn_bg_color'] : ''; ?></div><span class="copied-message"></span><?php } ?>
                        </div>
                </div>
                <div class="wl-login">
                        <div class="wl-label-title">
                                <label for="login-btn-color"><?php _e('Color', 'wl-login-master'); ?></label>
                        </div>
                        <div class="login-btn-color-wrapper">
                                <input type='color' name=admin_login_form[login_btn_color] class='wl-login-btn-text-color' value='<?php echo !empty($admin_login['login_btn_color']) ? $admin_login['login_btn_color'] : ''; ?>' />
                                <?php if (!empty($admin_login['login_btn_color'])) { ?><div class="color-code"><?php echo !empty($admin_login['login_btn_color']) ? $admin_login['login_btn_color'] : ''; ?></div><span class="copied-message"></span><?php } ?>
                        </div>
                </div>
                <div class="wl-login">
                        <div class="wl-label-title">
                                <label for="login-btn"><?php _e('Font Size', 'wl-login-master'); ?></label>
                        </div>
                        <div class="login-btn-font-size-wrapper">
                                <input type='range' name=admin_login_form[link_font_size] class='login-btn-font-size' value='<?php echo !empty($admin_login['link_font_size']) ? $admin_login['link_font_size'] : 0; ?>' min="0" max="100" />
                                <label for="" class="login-btn-font-size-range"><?php echo !empty($admin_login['link_font_size']) ? $admin_login['link_font_size'] : 0; ?>px</label>
                        </div>
                </div>
                <div class="wl-login">
                        <div class="wl-label-title">
                                <label for="background-bkur"><?php _e('Margin', 'wl-login-master'); ?></label>
                        </div>
                        <div class="login-btn-margin-wrapper">
                                <input type='number' name=admin_login_form[login_btn_margin_top] class='login-btn-margin' value='<?php echo !empty($admin_login['login_btn_margin_top']) ? $admin_login['login_btn_margin_top'] : ''; ?>' min="0" max="500" placeholder="Top" />
                                <input type='number' name=admin_login_form[login_btn_margin_right] class='login-btn-margin' value='<?php echo !empty($admin_login['login_btn_margin_right']) ? $admin_login['login_btn_margin_right'] : ''; ?>' min="0" max="500" placeholder="Right" />
                                <input type='number' name=admin_login_form[login_btn_margin_bottom] class='login-btn-margin' value='<?php echo !empty($admin_login['login_btn_margin_bottom']) ? $admin_login['login_btn_margin_bottom'] : ''; ?>' min="0" max="500" placeholder="Bottom" />
                                <input type='number' name=admin_login_form[login_btn_margin_left] class='login-btn-margin' value='<?php echo !empty($admin_login['login_btn_margin_left']) ? $admin_login['login_btn_margin_left'] : ''; ?>' min="0" max="500" placeholder="Left" />
                                <span>px</span>
                        </div>
                </div>
                <div class="wl-login">
                        <div class="wl-label-title">
                                <label for="background-bkur"><?php _e('Padding', 'wl-login-master'); ?></label>
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


<?php }
