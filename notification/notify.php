<?php
// Check if Vayu Blocks plugin is activated
if ( !is_plugin_active('vayu-blocks/vayu-blocks.php' )) {
    vayu_x_activation_callback();
}

// Activation callback function
function vayu_x_activation_callback() {
    // Code to display admin notice/banner
    add_action( 'admin_notices', 'vayu_x_display_admin_notice' );
}

function vayu_x_display_admin_notice() {
    ?>
    <div class="notice notice-info vayu-wrapper-banner is-dismissible">
        <div class="left">
        <h2 class="title"><?php esc_html_e( 'Please Install & Activate Vayu Blocks', 'vayu-x' ); ?></h2>
        <p><?php esc_html_e( 'Once the Vayu Blocks plugin is installed, you’ll be set to create amazing high-performance, visually appealing websites.', 'vayu-x' ); ?></p>
        
        <?php
            if (is_plugin_active('vayu-blocks/vayu-blocks.php')) {
                echo '<p>';
                esc_html_e('Thank you for using Vayu Blocks! Enjoy your experience.', 'vayu-x');
                echo '</p>';
            } else {
                // Check if Vayu Blocks plugin is installed
                if (vayu_x_is_plugin_installed('vayu-blocks')) { ?>
                    <!-- If installed but not activated, show activation button -->
                    <button class="button button-primary" id="install-vayu-blocks"><span class="actiavte-text"><?php esc_html_e( 'Activate', 'vayu-x' ); ?></span><span class="dashicons dashicons-update loader"></span></button>
                <?php } else {  ?>
                    <!-- If not installed, show install button -->
                    <button class="button button-primary" id="install-vayu-blocks"><span class="install-text"><?php esc_html_e( 'Install', 'vayu-x' ); ?></span><span class="dashicons dashicons-update loader"></span></button>
                <?php }
            }
            ?>
        
        
        
        
        <a href="<?php echo esc_url('https://themehunk.com/vayu-blocks/'); ?>" target="_blank" class="button learn-more"><?php esc_html_e( 'Learn More', 'vayu-x' ); ?></a>    
    </div>

        <div class="right">
            <img src="<?php echo get_template_directory_uri(). '/notification/banner.png' ?>" />
        </div>
        
    </div>
    <?php
}

// Custom function to check if a plugin is installed
function vayu_x_is_plugin_installed($plugin_slug) {
    // include_once( ABSPATH . 'wp-admin/includes/plugin-install.php' );
    $plugin_dir = WP_PLUGIN_DIR . '/' . $plugin_slug;
    return is_dir($plugin_dir);
}

function vayu_install_custom_plugin( $plugin_slug ) {
    require_once ABSPATH . 'wp-admin/includes/plugin-install.php';
    require_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';

    $plugin_info = plugins_api( 'plugin_information', array( 'slug' => $plugin_slug ) );

    if ( is_wp_error( $plugin_info ) ) {
        return $plugin_info->get_error_message();
    }

    $upgrader = new Plugin_Upgrader( new Plugin_Installer_Skin( array(
        'api' => $plugin_info,
    ) ) );

    $result = $upgrader->install( $plugin_info->download_link );

    if ( is_wp_error( $result ) ) {
        return $result->get_error_message();
    }

    return  "success";
}


// AJAX handler for installing and activating Vayu Blocks

add_action('wp_ajax_vayu_blocks_install_and_activate_callback', 'vayu_blocks_install_and_activate_callback');
add_action('wp_ajax_nopriv_vayu_blocks_install_and_activate_callback', 'vayu_blocks_install_and_activate_callback');

// Callback function to install and activate plugin
function vayu_blocks_install_and_activate_callback() {
    // Check nonce for security
    check_ajax_referer('vayunonce', 'security');
    // Retrieve plugin slug from AJAX request
 $plugin_slug = isset($_POST['plugin_slug']) ? sanitize_text_field($_POST['plugin_slug']) : '';

 // Get the full path to the main plugin file
 $plugin_file = WP_PLUGIN_DIR . '/' . $plugin_slug . '/' . $plugin_slug . '.php';

    // Check if plugin is already installed but not activated
    if (vayu_x_is_plugin_installed($plugin_slug) && !is_plugin_active($plugin_slug)) {

       
        // Activate the plugin
        $status = activate_plugin($plugin_file);
        if (is_wp_error($status)) {
            wp_send_json_error(array('message' => $status->get_error_message()));
        }
    } else {
        // Install the plugin

        $status = vayu_install_custom_plugin($plugin_slug);

        if (is_wp_error($status)) {
            wp_send_json_error(array('message' => $status->get_error_message()));
        }
        
        // Activate the plugin
        $status = activate_plugin($plugin_file);
        if (is_wp_error($status)) {
            wp_send_json_error(array('message' => $status->get_error_message()));
        }
    }

    // Return success response
    wp_send_json_success(array('message' => 'Plugin installed and activated successfully.'));
}

function vayu_x_admin_script() {

	wp_enqueue_style('vayu-x-admin-css', get_template_directory_uri() . '/notification/css/admin.css', array(), '1.0.0', 'all');

    // Enqueue the JavaScript file without jQuery dependency
    wp_enqueue_script( 'vayu-x-notifyjs', get_template_directory_uri() . '/notification/js/notify.js', array('jquery'), '1.0', true );


    // Pass AJAX URL to the script
    wp_localize_script( 'vayu-x-notifyjs', 'theme_data', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'security' => wp_create_nonce( 'vayunonce' ), // Create nonce for security
        'redirectUrl' => admin_url('admin.php?page=vayu-blocks') // Generate dynamic URL
    ) );
}
add_action( 'admin_enqueue_scripts', 'vayu_x_admin_script' );




function vayu_check_plugin_status() {
    $plugin_slug = isset($_POST['plugin_slug']) ? sanitize_text_field($_POST['plugin_slug']) : '';
    $status = '';
    // Check if the plugin slug is provided
    if (empty($plugin_slug)) {
        wp_send_json_error('Plugin slug is missing.');
    }

    // Check if the plugin is installed
    if (vayu_x_is_plugin_installed($plugin_slug)) {
        // Check if the plugin is activated
        if (is_plugin_active($plugin_slug.'/'.$plugin_slug.'.php')) {
            $status = 'activated';
        } else {
            $status = 'installed';
        }
    } else {
        $status = 'notinstalled';
    }

    // error_log(print_r($plugin_slug, true));

    // Send the status as a JSON object
    wp_send_json_success(array('status' => $status));
}

add_action('wp_ajax_vayu_check_plugin_status', 'vayu_check_plugin_status');
add_action('wp_ajax_nopriv_vayu_check_plugin_status', 'vayu_check_plugin_status');

