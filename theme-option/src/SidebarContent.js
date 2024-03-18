import {Fragment, useState, useEffect} from '@wordpress/element';
import { __ } from '@wordpress/i18n';

const SidebarContent = () => {
    const [buttonText, setButtonText] = useState('Install');
    const [buttonEnable, setbuttonEnable] = useState(false);

    useEffect(() => {
        // Wait for ajaxurl to be defined
        const waitForAjaxUrl = setInterval(() => {
            if (wpapi.ajaxurl) { 
                clearInterval(waitForAjaxUrl);
                fetchPluginStatus();
            }
        }, 0);
    
        // Cleanup function to clear interval
        return () => clearInterval(waitForAjaxUrl);
    }, []);
   
    const fetchPluginStatus = () => {
        fetch(wpapi.ajaxurl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new URLSearchParams({
                action: 'vayu_check_plugin_status',
                plugin_slug: 'vayu-blocks'
            }),
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            if (!data || typeof data !== 'object') {
                throw new Error('Invalid response data');
            }
        // Check if data object exists and has status property
    if (data && data.data && data.data.status) {
        const status = data.data.status;
        // Example: Update button text based on plugin status
        console.log(status);
        if (status === 'installed') {
            setButtonText('Activate');
        } else if (status === 'activated') { 
            setButtonText('Activated');
            setbuttonEnable(true);
        } else if (status === 'notinstalled') {
            setButtonText('Install');
        } else {
            console.error('Unknown plugin status:', status);
        }
    } else {
        console.error('Invalid data structure:', data);
    }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    };
    
    
    
    

    const handleInstallActivate = () => {
        // Perform AJAX request to install and activate the plugin
        fetch(wpapi.ajaxurl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new URLSearchParams({
                action: 'vayu_blocks_install_and_activate_callback',
                plugin_slug: 'vayu-blocks'
            }),
        })
        .then(response => response.json())
        .then(data => { console.log('Response:', data);
            // Check if the request was successful
            if (data.success) { 
                // alert('Plugin installed and activated successfully!');
                // Reload the page to remove the admin notice
                window.location.reload();
            } else {
                // Error occurred during installation and activation
                alert('Error: ' + data.data.message);
            }
        })
        .catch(error => {
            // Error occurred during AJAX request
            console.error('Error:', error);
        });
    };

    return (
        <Fragment>
            <div className="sidebar-option-content-wrp">
               <div className="content-box">
                <h3> { __( 'Vayu Blocks', 'vayu-x' )}</h3>
                <p>{__( 'Ignite your imagination with Vayu Blocks — An innovative tool for creative minds. The Vayu Blocks is an add-on plugin For Gutenberg Block Editor. Quickstart the Gutenberg editor with Powerful and elegant blocks to design stunning websites.', 'vayu-x' )}</p>
                <button className="button button-primary" onClick={handleInstallActivate} disabled={buttonEnable}>
                    <span>{buttonText}</span>
                </button>
                <a href="https://themehunk.com/vayu-blocks/" target="_blank" className="content-link button"> {__( 'Learn More', 'vayu-x' )}</a>
               </div>
               <hr></hr>
               <div className="content-box">
                <h3> {__( 'Leave us a review', 'vayu-x' )}</h3>
                <p>{__( 'We would love to hear your feedback.', 'vayu-x' )}</p>
                <a href="https://www.trustpilot.com/review/themehunk.com" target="_blank" className="content-link"> {__( 'Submit Review', 'vayu-x' )}</a>
               </div>
               <hr></hr>
               <div className="content-box">
                <h3> {__( 'Support', 'vayu-x' )}</h3>
                <p>{__( 'Have a question, we are happy to help! Get in touch with our support team.', 'vayu-x' )}</p>
                <a href="https://themehunk.com/contact-us/" target="_blank" className="content-link"> {__( 'Submit a Ticket', 'vayu-x' )}</a>
               </div>
            </div>
        </Fragment>
    );
};

export default SidebarContent;
