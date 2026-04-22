jQuery(document).ready(function($) {

    // INSTALL BUTTON (already correct)
    $('#install-vayu-blocks').on('click', function() {

        $('#install-vayu-blocks .actiavte-text').text("Activating..");
        $('#install-vayu-blocks .install-text').text("Initializing..");
        $('.loader').show();

        $.ajax({
            url: theme_data.ajax_url,
            method: 'POST',
            dataType: 'json',
            data: {
                action: 'vayu_blocks_install_and_activate_callback',
                plugin_slug: 'vayu-blocks',
                security: theme_data.security,
            },

            success: function(response) {

                if (response.success) {

                    setNoticeCookie();

                    window.location.href = theme_data.redirectUrl + '&notice-disable=1';

                } else {
                    $('.loader').hide();
                    alert('Error: ' + response.data.message);
                }
            },

            error: function(xhr, status, error) {
                $('.loader').hide();
                console.error('AJAX Error:', error);
            }
        });

    });


    // ✅ NOTICE DISMISS FIX (IMPORTANT)
    $(document).on('click', '.notice-dismiss', function() {

        setNoticeCookie(); // 

    });


    // ✅ COOKIE FUNCTION (same as PHP logic)
    function setNoticeCookie() {
        var expireDate = new Date();
        expireDate.setTime(expireDate.getTime() + (7 * 24 * 60 * 60 * 1000));

        document.cookie = "vayu_x_thms_time=" + expireDate.getTime() +
            "; expires=" + expireDate.toUTCString() +
            "; path=/";
    }

});