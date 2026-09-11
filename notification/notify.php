<?php
function vayu_x_set_notice_cookie() {
    $expire_time = time() + (86400 * 7); // 7 days in seconds

    if (!isset($_COOKIE['vayu_x_thms_time'])) {
        // Set a cookie for 7 days
        setcookie('vayu_x_thms_time', $expire_time, $expire_time, COOKIEPATH, COOKIE_DOMAIN);
    }
}

function vayu_x_clear_notice_cookie() {
    // Clear the cookie when the theme is switched
    if (isset($_COOKIE['vayu_x_thms_time'])) {
        setcookie('vayu_x_thms_time', '', time() - 3600, COOKIEPATH, COOKIE_DOMAIN);
    }
}

function vayu_x_unset_cookie() {
    $visit_time = time();
    if (isset($_COOKIE['vayu_x_thms_time']) && $_COOKIE['vayu_x_thms_time'] < $visit_time) {
        setcookie('vayu_x_thms_time', '', time() - 3600, COOKIEPATH, COOKIE_DOMAIN);
    }
}

if (isset($_GET['notice-disable']) && $_GET['notice-disable'] == '1') {
    add_action('admin_init', 'vayu_x_set_notice_cookie');
}

if (!isset($_COOKIE['vayu_x_thms_time'])) {
    add_action('admin_notices', 'vayu_x_display_admin_notice');
}

// Always add the vayu_x_unset_cookie function to admin_init to ensure the cookie is unset if expired
add_action('admin_init', 'vayu_x_unset_cookie');

function vayu_x_display_admin_notice() {

     if ( ! current_user_can( 'install_plugins' ) ) {
        return;
    }

        // Check if Vayu Blocks plugin is activated
    if ( is_plugin_active('vayu-blocks/vayu-blocks.php' )) {
        return;
    }
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
            <img src="<?php echo esc_url( get_template_directory_uri() . '/notification/banner.png' ); ?>" alt="banner" />

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

add_action( 'wp_ajax_vayu_blocks_install_and_activate_callback', 'vayu_blocks_install_and_activate_callback' );

/**
 * Install and activate plugin.
 */
function vayu_blocks_install_and_activate_callback() {

    // Verify AJAX nonce.
    check_ajax_referer( 'vayunonce', 'security' );

    // Only users who can manage plugins are allowed.
    if ( ! current_user_can( 'install_plugins' ) ) {
        wp_send_json_error(
            array(
                'message' => __( 'You do not have permission to install or activate plugins.', 'vayu-x' ),
            ),
            403
        );
    }

    // Retrieve and sanitize plugin slug.
    $plugin_slug = isset( $_POST['plugin_slug'] )
        ? sanitize_key( wp_unslash( $_POST['plugin_slug'] ) )
        : '';

    if ( empty( $plugin_slug ) ) {
        wp_send_json_error(
            array(
                'message' => __( 'Invalid plugin slug.', 'vayu-x' ),
            ),
            400
        );
    }

    // Get the full path to the main plugin file.
    $plugin_file = WP_PLUGIN_DIR . '/' . $plugin_slug . '/' . $plugin_slug . '.php';

    // Check if plugin is already installed but not activated.
    if ( vayu_x_is_plugin_installed( $plugin_slug ) && ! is_plugin_active( $plugin_file ) ) {

        // Activate the plugin.
        $status = activate_plugin( $plugin_file );

        if ( is_wp_error( $status ) ) {
            wp_send_json_error(
                array(
                    'message' => $status->get_error_message(),
                )
            );
        }
    } else {

        // Install the plugin.
        $status = vayu_install_custom_plugin( $plugin_slug );

        if ( is_wp_error( $status ) ) {
            wp_send_json_error(
                array(
                    'message' => $status->get_error_message(),
                )
            );
        }

        // Activate the plugin.
        $status = activate_plugin( $plugin_file );

        if ( is_wp_error( $status ) ) {
            wp_send_json_error(
                array(
                    'message' => $status->get_error_message(),
                )
            );
        }
    }

    // Return success response.
    wp_send_json_success(
        array(
            'message' => __( 'Plugin installed and activated successfully.', 'vayu-x' ),
        )
    );
}

function vayu_x_admin_script() {

     /*
     * Capability check first.
     *
     * This also prevents the nonce from being generated for users
     * who cannot install plugins.
     */
    if ( ! current_user_can( 'install_plugins' ) ) {
        return;
    }

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




/**
 * AJAX handler for checking Vayu Blocks status.
 */
function vayu_check_plugin_status() {

    // User must have permission to manage/install plugins.
    if ( ! current_user_can( 'install_plugins' ) ) {
        wp_send_json_error(
            array(
                'message' => __( 'You do not have permission to check plugin status.', 'vayu-x' ),
            ),
            403
        );
    }

    // Verify nonce.
    check_ajax_referer( 'vayunonce', 'security' );

    // This endpoint is only for Vayu Blocks.
    $plugin_file = 'vayu-blocks/vayu-blocks.php';
    $plugin_path = WP_PLUGIN_DIR . '/' . $plugin_file;

    // Check actual plugin file.
    if ( file_exists( $plugin_path ) ) {

        if ( is_plugin_active( $plugin_file ) ) {
            $status = 'activated';
        } else {
            $status = 'installed';
        }

    } else {
        $status = 'notinstalled';
    }

    wp_send_json_success(
        array(
            'status' => $status,
        )
    );
}

add_action(
    'wp_ajax_vayu_check_plugin_status',
    'vayu_check_plugin_status'
);

