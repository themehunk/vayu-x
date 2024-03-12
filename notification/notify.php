<?php
// Register custom activation hook
// add_action('after_switch_theme', 'vayu_x_activation_callback');

vayu_x_activation_callback();
// Activation callback function
function vayu_x_activation_callback() {
    // Code to display admin notice/banner
    add_action( 'admin_notices', 'vayu_x_display_admin_notice' );
}


function vayu_x_display_admin_notice() {
    ?>
    <div class="notice notice-info vayu-wrapper-banner is-dismissible">
        <div class="left">
        <h2 class="title"><?php esc_html_e( 'Make awesome website in a minute', 'vayu-x' ); ?></h2>
        <p><?php esc_html_e( 'Vayu Blocks is completely user-friendly and improves the default WordPress block editor,
to create more flexible environment for creating amazing websites.', 'vayu-x' ); ?></p>
        <button class="button button-primary" id="install-vayu-blocks"><?php esc_html_e( 'Install', 'vayu-x' ); ?></button>
        <a href="#" class="button learn-more"><?php esc_html_e( 'Learn More', 'vayu-x' ); ?></a>    
    </div>
        <div class="right">
            <img src="<?php echo get_template_directory_uri(). '/notification/banner.png' ?>" />
        </div>
        
    </div>
    <?php
}

// AJAX handler for installing and activating Vayu Blocks
add_action( 'wp_ajax_vayu_blocks_install_callback', 'vayu_blocks_install_callback' );




// Callback function to install and activate plugin
function vayu_blocks_install_callback() {
    // Check nonce for security
    check_ajax_referer('vayunonce', 'security');

    // Retrieve plugin slug from AJAX request
    $plugin_slug = isset($_POST['plugin_slug']) ? sanitize_text_field($_POST['plugin_slug']) : '';

    // Install the plugin from the WordPress plugin repository
    $status = install_plugin($plugin_slug);
    if (is_wp_error($status)) {
        wp_send_json_error(array('message' => $status->get_error_message()));
    }

    // Activate the plugin
    $status = activate_plugin($plugin_slug);
    if (is_wp_error($status)) {
        wp_send_json_error(array('message' => $status->get_error_message()));
    }

    // Return success response
    wp_send_json_success(array('message' => 'Plugin installed and activated successfully.'));
}



