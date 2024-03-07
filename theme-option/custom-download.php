<?php
// Callback function to install and activate the plugin
add_action('wp_ajax_install_plugin_ajax_callback', 'install_plugin_ajax_callback');
add_action('wp_ajax_nopriv_install_plugin_ajax_callback', 'install_plugin_ajax_callback');

function install_plugin_ajax_callback() {
  // Log the start of the function to the error log
  error_log('AJAX request received: install_plugin_ajax_callback');

  // Check user permissions or any other necessary conditions
  // Sanitize input data if required

  // Log the received data to the error log
  error_log('Received AJAX request data: ' . print_r($_POST, true));

  // Example plugin URL
  $plugin_url = 'https://anurag.wooblocks.com/anurag/wp-content/uploads/2024/03/vayu-blocks.zip';

  // Log the plugin URL to the error log
  error_log('Plugin URL: ' . $plugin_url);

  // Download the plugin ZIP file
  $temp_file = download_url($plugin_url);
  if (is_wp_error($temp_file)) {
      // Log the error message if download failed
      error_log('Error downloading plugin: ' . $temp_file->get_error_message());

      // Send error response
      wp_send_json_error(array('message' => $temp_file->get_error_message()));
  }

  // Log success message if download succeeded
  error_log('Plugin downloaded successfully: ' . $temp_file);

  // Install the plugin from the downloaded ZIP file
  $status = WP_Filesystem();
  if ($status) {
      // Log filesystem access success
      error_log('Filesystem accessed successfully');

      $plugin_path = WP_PLUGIN_DIR . '/'; // Change to the appropriate directory if needed
      $plugin = plugin_basename($plugin_path . 'plugin.zip');
      $result = unzip_file($temp_file, $plugin_path);
      if (is_wp_error($result)) {
          // Log error if plugin installation failed
          error_log('Error installing plugin: ' . $result->get_error_message());

          // Send error response
          wp_send_json_error(array('message' => $result->get_error_message()));
      }
  } else {
      // Log filesystem access failure
      error_log('Failed to access filesystem.');

      // Send error response
      wp_send_json_error(array('message' => 'Failed to access filesystem.'));
  }

  // Log success message if plugin installation succeeded
  error_log('Plugin installed successfully');

  // Activate the plugin
$status = activate_plugin($plugin);
if (is_wp_error($status)) {
    // Log error if plugin activation failed
    error_log('Error activating plugin: ' . $status->get_error_message());

    // Send error response
    wp_send_json_error(array('message' => $status->get_error_message()));
} else {
    // Log success message if plugin activation succeeded
    error_log('Plugin activated successfully');
}


  // Log success message if plugin activation succeeded
  error_log('Plugin activated successfully');

  // Return success response
  wp_send_json_success(array('message' => 'Plugin installed and activated successfully.'));
}