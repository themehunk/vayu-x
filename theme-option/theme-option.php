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

    add_action('admin_enqueue_scripts', array($this, 'blockline_enqueue_scripts'));
    add_action('admin_menu', array($this, 'blockline_register_settings_menu'),99);
      
    }

    function blockline_register_settings_menu() {

    $menu_title = sprintf( esc_html__( '%s Options', 'blockline' ), apply_filters( 'thsm_page_title', __( 'Vayu X', 'vayu-x' ) ) );

    add_theme_page(esc_html__('Blockline', 'blockline'), $menu_title, 'edit_theme_options', 'blockline_thunk_started', array($this, 'blockline_settings_page'));   
   
  }
   
   function blockline_enqueue_scripts($hook_suffix) {

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
          'blocklineUri' => trailingslashit(get_template_directory_uri()),
          'themeName' => wp_get_theme()->get( 'Name' ),
          'themeVersion' =>  wp_get_theme()->get( 'Version' ),
          'homeUrl2' => get_home_url(),
        )
    );

    }
    
   }

   function blockline_settings_page() {
    ?>
        <div id="blockline-theme-setting-page" class="blockline-theme-setting-page">
        </div>
    <?php

   }
  
}

$obj = new Vayu_theme_option();

//theme option panel
require get_template_directory() . '/theme-option/plugin-data.php';



add_action('rest_api_init', function () {
  // Endpoint to install and activate the plugin
  register_rest_route('vayu-x-plugin/v1', '/install-plugin', array(
      'methods' => ['POST', 'GET'],
      'callback' => 'install_plugin_callback',
      
  ));
});


// Callback function to install and activate the plugin
function install_plugin_callback($request) {

  $data = $request->get_json_params(); // Get JSON data sent in the request

  // Check user permissions or any other necessary conditions
  // Sanitize input data if required
  // Example plugin URL
  $plugin_url = 'https://www.themehunk.com/plugin.zip';

  // Download the plugin ZIP file
  $temp_file = download_url($plugin_url);
  if (is_wp_error($temp_file)) {
      return rest_ensure_response(array(
          'success' => false,
          'message' => $temp_file->get_error_message(),
      ), 400);
  }

  // Install the plugin from the downloaded ZIP file
  $status = WP_Filesystem();
  if ($status) {
      $plugin_path = WP_PLUGIN_DIR . '/'; // Change to the appropriate directory if needed
      $plugin = plugin_basename($plugin_path . 'plugin.zip');
      $result = unzip_file($temp_file, $plugin_path);
      if (is_wp_error($result)) {
          return rest_ensure_response(array(
              'success' => false,
              'message' => $result->get_error_message(),
          ), 400);
      }
  } else {
      return rest_ensure_response(array(
          'success' => false,
          'message' => 'Failed to access filesystem.',
      ), 400);
  }

  // Activate the plugin
  $status = activate_plugin($plugin);
  if (is_wp_error($status)) {
      return rest_ensure_response(array(
          'success' => false,
          'message' => $status->get_error_message(),
      ), 400);
  }

  // Return success response
  return rest_ensure_response(array(
      'success' => true,
      'message' => 'Plugin installed and activated successfully.',
  ));
}

