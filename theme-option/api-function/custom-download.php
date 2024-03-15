<?php
// Add AJAX action for getting plugin status
add_action('wp_ajax_get_plugin_status_callback', 'get_plugin_status_callback');
add_action('wp_ajax_nopriv_get_plugin_status_callback', 'get_plugin_status_callback');

// Callback function to fetch plugin status
function get_plugin_status_callback() {
    // Check nonce for security
    check_ajax_referer('get_plugin_status_nonce', 'security');

    // Retrieve plugin slug from AJAX request
    $plugin_slug = isset($_POST['plugin_slug']) ? sanitize_text_field($_POST['plugin_slug']) : '';

    // Check if the plugin is installed
    $is_installed = file_exists(WP_PLUGIN_DIR . '/' . $plugin_slug . '/' . $plugin_slug . '.php');

    // Check if the plugin is activated
    $is_activated = is_plugin_active($plugin_slug . '/' . $plugin_slug . '.php');

    // Determine the status based on installation and activation
    $status = 'not_installed';
    if ($is_installed) {
        $status = $is_activated ? 'installed_and_activated' : 'installed_not_activated';
    }

    // Return the status
    wp_send_json_success(array('status' => $status));
}

// Add AJAX action for installing and activating plugin
add_action('wp_ajax_install_and_activate_plugin_callback', 'install_and_activate_plugin_callback');

// Callback function to install and activate plugin
function install_and_activate_plugin_callback() {
   
    // Check nonce for security
    check_ajax_referer('install_and_activate_plugin_nonce', 'security');

    // Retrieve plugin slug from AJAX request
    $plugin_slug = isset($_POST['plugin_slug']) ? sanitize_text_field($_POST['plugin_slug']) : '';

    // Example plugin URL
//  $plugin_url = 'https://example.com/plugins/' . $plugin_slug . '.zip'; // Change to the URL of your plugin

    $plugin_url = 'https://anurag.wooblocks.com/anurag/vayu-blocks/'; // Change to the URL of your plugin

    // Download the plugin ZIP file
    $temp_file = download_url($plugin_url);
    if (is_wp_error($temp_file)) {
        wp_send_json_error(array('message' => $temp_file->get_error_message()));
    }

    // Install the plugin from the downloaded ZIP file
    $status = WP_Filesystem();
    if ($status) {
        $plugin_path = WP_PLUGIN_DIR . '/' . $plugin_slug . '/'; // Change to the appropriate directory
        $plugin = plugin_basename($plugin_path . $plugin_slug . '.zip');
        $result = unzip_file($temp_file, $plugin_path);
        if (is_wp_error($result)) {
            wp_send_json_error(array('message' => $result->get_error_message()));
        }
    } else {
        wp_send_json_error(array('message' => 'Failed to access filesystem.'));
    }

    // Activate the plugin
    $status = activate_plugin($plugin_slug . '/' . $plugin_slug . '.php');
    if (is_wp_error($status)) {
        wp_send_json_error(array('message' => $status->get_error_message()));
    }

    // Return success response
    wp_send_json_success(array('message' => 'Plugin installed and activated successfully.'));
}
