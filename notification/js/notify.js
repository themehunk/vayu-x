document.addEventListener( 'DOMContentLoaded', function() {
    document.getElementById( 'install-vayu-blocks' ).addEventListener( 'click', function() {
        // AJAX request to install Vayu Blocks
        wp.ajax.post( 'vayu_blocks_install_callback', {
            _ajax_nonce: my_theme_ajax_nonce, // Nonce for security
            action: 'vayu_blocks_install_callback'
        }).done( function( response ) {
            // Installation successful
            alert( 'Vayu Blocks installed successfully!' );
            // Hide the admin notice/banner
            document.querySelector( '.notice' ).style.display = 'none';
        }).fail( function( error ) {
            // Installation failed
            alert( 'Error installing Vayu Blocks: ' + error.responseText );
        });
    });
});

// Call the install_and_activate_plugin AJAX action
function installAndActivatePlugin() {
    // Nonce for security
    var securityNonce = vayuAjax.security; // Replace with your security nonce

    // Data to send in the AJAX request
    var data = {
        action: 'vayu_blocks_install_callback',
        security: securityNonce,
        plugin_slug: 'vayu-blocks' // Replace with the slug of your plugin
    };

    // Make the AJAX request
    wp.ajax.post('vayu_blocks_install_callback', data)
        .done(function(response) {
            // Handle success
            alert('Plugin installed and activated successfully!');
        })
        .fail(function(error) {
            // Handle error
            alert('Error: ' + error.message);
        });
}

// Call the installAndActivatePlugin function when needed
document.addEventListener('DOMContentLoaded', function() {
    // Attach click event listener to the button
    var installButton = document.getElementById('install-vayu-blocks');
    if (installButton) {
        installButton.addEventListener('click', function() {
            installAndActivatePlugin();
        });
    }
});

