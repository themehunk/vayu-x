jQuery(document).ready(function($) {
    $('#install-vayu-blocks').on('click', function() { 
        // Show loading indicator
        $('#install-vayu-blocks .actiavte-text').text("Activating..");
        $('#install-vayu-blocks .install-text').text("Initializing..");
        $('.loader').show();
        // Perform AJAX request to install and activate the plugin
        $.ajax({
            url: theme_data.ajax_url,
            method: 'POST',
            dataType: 'html',
            data: {
                action: 'vayu_blocks_install_and_activate_callback', // AJAX action hoo
                plugin_slug: 'vayu-blocks',// Plugin slug
                security: theme_data.security,
            },
            success: function(response) {
                 // Hide loading indicator
                // Check if the request was successful
                if (response) {
                    // Plugin installed and activated successfully
                    // alert('Plugin installed and activated successfully!');

                    // Reload the page to remove the admin notice
                    // location.reload();
                    window.location.href = theme_data.redirectUrl;
                    // $('.loader').hide();
                } else {
                    // Error occurred during installation and activation
                    alert('Error: ' + response.data.message);
                }
            },
            error: function(xhr, status, error) {
                // Error occurred during AJAX request
                console.error('Error:', error);
            }
        });
    });
});