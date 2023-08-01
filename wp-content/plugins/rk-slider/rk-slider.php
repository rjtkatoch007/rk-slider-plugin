<?php
/*
 * Plugin Name:       RK Slider
 * Plugin URI:        https://https://wordpress.org/
 * Description:       Plugin for slider.
 * Version:           1.0.0
 * Author:            rjtdev007
 * Author URI:        https://https://wordpress.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       rk-slider
 * Domain Path:       /languages
 */
// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if( ! class_exists('RK_Slider')){
    class RK_Slider{
        function __construct(){
            $this->define_constants();
            add_action('admin_menu', array($this, 'add_menu'));
            require_once(RK_SLIDER_PATH.'post-types/class.rk-slider-cpt.php');
            $RK_slider_Post_Type = new RK_slider_Post_Type();

            require_once(RK_SLIDER_PATH.'class.rk-slider-settings.php');
            $RK_Slider_Settings = new RK_Slider_Settings();

            require_once(RK_SLIDER_PATH.'shortcodes/class.rk-slider-shortcode.php');
            $RK_Slider_Shortcode = new RK_Slider_Shortcode();
        }

        public function define_constants(){
            define('RK_SLIDER_PATH', plugin_dir_path(__FILE__));  
            define('RK_SLIDER_URL', plugin_dir_url(__FILE__));
            define('RK_SLIDER_VERSION', '1.0.0');
        }

        public static function activate(){
            update_option('rewrite_rules', '');
        }
        public static function deactivate(){
            flush_rewrite_rules();
            unregister_post_type('rk-slider');
        }
        public static function uninstall(){
            
        }
        public function add_menu(){
            add_menu_page(
                'RK Slider Options',
                'RK Slider',
                'manage_options',
                'rk_slider_admin',
                array($this, 'rk_slider_setting_page'),
                'dashicons-images-alt2',
                
            );

            add_submenu_page(
                'rk_slider_admin',
                'Manage Slides',
                'Manage Slides',
                'manage_options',
                'edit.php?post_type=rk-slider',
                null,
                null
                
                
            );

            add_submenu_page(
                'rk_slider_admin',
                'Add New Slide',
                'Add New Slide',
                'manage_options',
                'post-new.php?post_type=rk-slider',
                null,
                null
                
                
            );
        }
        public function rk_slider_setting_page(){
            if(! current_user_can('manage_options')){
                return;
            }
            if(isset($_GET['settings-updated'])){
                add_settings_error('rk_slider_options', 'rk_slider_message','Settings Saved','success');
            }
            settings_errors('rk_slider_options');
            require_once( RK_SLIDER_PATH.'views/setting-page.php' );
        }
    }
}

if(class_exists('RK_Slider')){
    register_activation_hook(__FILE__, array('RK_Slider', 'activate'));
    register_deactivation_hook(__FILE__, array('RK_Slider', 'deactivate'));
    register_uninstall_hook(__FILE__, array('RK_Slider', 'uninstall'));
    $rk_slider = new RK_Slider();

}