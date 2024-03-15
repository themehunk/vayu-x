<?php 

class Vayu_theme_option{

    /**
     * Menu page title
     *
     * @since 1.0
     * @var array $menu_page_title
     */
    static public $menu_page_title = 'blockline';

    /**
     * Current Slug
     *
     * @since 1.0
     * @var array $current_slug
     */
    static public $current_slug = 'general';

    function __construct(){

    add_action('admin_enqueue_scripts', array($this, 'vayu_x_enqueue_scripts'));
    add_action('admin_menu', array($this, 'blockline_register_settings_menu'),99);
      
    }

    function blockline_register_settings_menu() {

    $menu_title = sprintf( esc_html__( '%s Options', 'vayu-x' ), apply_filters( 'thsm_page_title', __( 'Vayu X', 'vayu-x' ) ) );

    add_theme_page(esc_html__('Blockline', 'vayu-x'), $menu_title, 'edit_theme_options', 'blockline_thunk_started', array($this, 'vayu_x_settings_page'));   
   
  }
   
   function vayu_x_enqueue_scripts($hook_suffix) {
$get_plugin_status_nonce = wp_create_nonce('get_plugin_status_nonce');
$install_and_activate_plugin_nonce = wp_create_nonce('install_and_activate_plugin_nonce');

    if($hook_suffix == 'appearance_page_blockline_thunk_started') {

    wp_enqueue_style( 'blockline-settings-css', get_template_directory_uri() . '/theme-option/build/style-index.css', array(), '1.0.0', false );

    wp_enqueue_script( 'blockline-settings-js', get_template_directory_uri() . '/theme-option/build/index.js', array( 'wp-element', 'wp-i18n' ), '1.0', true );

    wp_localize_script(
        'blockline-settings-js',
        'wpapi',
        array(
          'homeUrl' => get_home_url(),
          'ajaxurl' => admin_url( 'admin-ajax.php' ),
          'wpnonce' => wp_create_nonce( "ajaxnonce" ),
          'vayuUri' => trailingslashit(get_template_directory_uri()),
          'themeName' => wp_get_theme()->get( 'Name' ),
          'themeVersion' =>  wp_get_theme()->get( 'Version' ),
          'homeUrl2' => get_home_url(),
          'getPluginStatusNonce' => $get_plugin_status_nonce,
          'installAndActivatePluginNonce' => $install_and_activate_plugin_nonce,
        )
    );

    }
    
   }

   function vayu_x_settings_page() {
    ?>
        <div id="blockline-theme-setting-page" class="blockline-theme-setting-page">
        </div>
    <?php

   }
  
}

$obj = new Vayu_theme_option();

//theme option panel
require get_template_directory() . '/theme-option/plugin-data.php';

// Below line is to include rest api function created for cutom pligin to be add in the list
// require get_template_directory() . '/theme-option/api-function/custom-download.php';