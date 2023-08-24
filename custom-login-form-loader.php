<?php
function admin_login_page_enqueue()
{
        wp_enqueue_style('cpm_admin_login_form_css_admin', plugin_dir_url(__FILE__) . '/style.css');

        wp_enqueue_media();
        wp_enqueue_script('cpm-jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js');
        wp_enqueue_script('cpm-fontawesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
        wp_enqueue_script('cpm_admin_login_form_js_admin', plugin_dir_url(__FILE__) . 'main.js');
}
add_action('admin_enqueue_scripts', 'admin_login_page_enqueue');

add_action('admin_menu', 'cpm_custom_admin_login_form');
function cpm_custom_admin_login_form()
{
        add_menu_page('CPM Login Master', 'CPM Login Master', 'manage_options', 'cpm_login_master', 'cpm_custom_login_page', 'dashicons-admin-network');
}
function cpm_custom_login_page()
{ ?>
        <form method="post" action="options.php" id="cpm-form">
                <h1>White Label WP Login </h1>
                <fieldset>
                        <?php
                        settings_fields('login-form-setting-group');
                        do_settings_sections('login-form-setting');
                        submit_button(); ?>
                </fieldset>
        </form>
<?php }





function custom_settings_fields()
{
        add_settings_section('general-section', '', 'admin_login_logo', 'login-form-setting');

        register_setting('login-form-setting-group', 'admin_login_form');
}
add_action('admin_init', 'custom_settings_fields');

function spit_out_theme_setting_section_callback()
{ ?>
        <legend><span class="number">1</span>Admin Login Form</legend>
<?php }

function admin_login_logo()
{
        $admin_login = get_option('admin_login_form');  ?>
        <fieldset>
                <legend><span class="number">1</span> Logo Settings</legend>
                <div class="cpm-login">

                        <div class="cpm-label-title">
                                <input type='hidden' id='admin_login_logo_hidden' name=admin_login_form[logo] value='<?php echo $admin_login['logo']; ?>' />
                                <label for="logo">Logo</label>
                        </div>
                        <div class="upload__box">
                                <div class="upload__btn-box">
                                        <?php if (empty($admin_login['logo'])) { ?>
                                                <label class="upload__btn">
                                                        <input type='button' class='cpm-upload-btn' value='Upload Logo' id='admin_login_logo' />
                                                </label>
                                        <?php } else { ?>
                                                <div class="cpm-img-upload">
                                                        <div class="avatar-edit">
                                                                <input type='button' class='cpm-upload-btn' value='Upload Image' />
                                                                <label for="imageUpload" id='admin_login_logo'></label>
                                                        </div>
                                                        <div class="avatar-preview">
                                                                <div id="image_preview_login_logo" style="background-image: url(<?php echo !empty($admin_login['logo']) ? $admin_login['logo'] : ''; ?>)"></div>
                                                        </div>
                                                </div>
                                        <?php } ?>
                                </div>
                        </div>
                </div>
        </fieldset>
        <fieldset class="cpm-background-settings">
                <legend><span class="number">2</span> Background Settings</legend>
                <div class="cpm-login">

                        <div class="cpm-label-title">
                                <input type='hidden' id='admin_login_bg_image_hidden' name=admin_login_form[bg_image] value='<?php echo !empty($admin_login['bg_image']) ? $admin_login['bg_image'] : ''; ?>' />
                                <label for="background-image">Background Image</label>
                        </div>
                        <div class="upload__box">
                                <div class="upload__btn-box">
                                        <?php if (empty($admin_login['bg_image'])) { ?>
                                                <label class="upload__btn">
                                                        <input type='button' class='cpm-upload-btn' value='Upload Image' id='admin_login_background_imge' />
                                                </label>
                                        <?php } else { ?>
                                                <div class="cpm-img-upload">
                                                        <div class="avatar-edit">
                                                                <input type='button' class='cpm-upload-btn' value='Upload Image' />
                                                                <label for="imageUpload" id='admin_login_background_imge'></label>
                                                        </div>
                                                        <div class="avatar-preview">
                                                                <div id="mobile_image_preview_login_bg" style="background-image: url(<?php echo !empty($admin_login['bg_image']) ? $admin_login['bg_image'] : ''; ?>)"></div>
                                                        </div>
                                                </div>
                                        <?php } ?>
                                </div>
                        </div>
                </div>
                <div class="cpm-login">
                        <div class="cpm-label-title">
                                <label for="background-bkur">Background Blur</label>
                        </div>
                        <input type='range' name=admin_login_form[bg_blur] class='bg-blur' value='<?php echo !empty($admin_login['bg_blur']) ?$admin_login['bg_blur'] : ''; ?>' min="0" max="100"/>
                        <label for="" class="bg-blur-range"><?php echo !empty($admin_login['bg_blur']) ?$admin_login['bg_blur'] : ''; ?>px</label>
                </div>
                <div class="cpm-login">
                        <div class="cpm-label-title">
                                <label for="background-color">Body Background Color</label>
                        </div>
                        <input type='color' name=admin_login_form[bg_color] class='' value='<?php echo !empty($admin_login['bg_color']) ? $admin_login['bg_color'] : ''; ?>' />
                </div>
                <div class="cpm-login">
                        <div class="cpm-label-title">
                                <label for="login-form-color">Background Color</label>
                        </div>
                        <input type='color' name=admin_login_form[login_box_bg_color] class='' value='<?php echo !empty($admin_login['login_box_bg_color']) ? $admin_login['login_box_bg_color'] : ''; ?>' />
                </div>
                <div class="cpm-login">
                        <div class="cpm-label-title">
                                <label for="lalert-box-bg-color">Alert Box Background Color</label>
                        </div>
                        <input type='color' name=admin_login_form[alert_box_bg_color] class='' value='<?php echo !empty($admin_login['alert_box_bg_color']) ? $admin_login['alert_box_bg_color'] : ''; ?>' />
                </div>
        </fieldset>
        <fieldset class="background-text-settings">
                <legend><span class="number">3</span> Text Settings</legend>
                <div class="cpm-login">
                        <div class="cpm-label-title">
                                <label for="alert-box-text-color">Alert Bod Text Color</label>
                        </div>
                        <input type='color' name=admin_login_form[alert_box_text_color] class='' value='<?php echo !empty($admin_login['alert_box_text_color']) ? $admin_login['alert_box_text_color'] : ''; ?>' />
                </div>
        </fieldset>

<?php }
