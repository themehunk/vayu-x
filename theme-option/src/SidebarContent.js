import {Fragment, useState, useEffect} from '@wordpress/element';
import { __ } from '@wordpress/i18n';
import { FaSpinner } from 'react-icons/fa';

const SidebarContent = () => {
    const [buttonText, setButtonText] = useState('Install');
    const [buttonEnable, setbuttonEnable] = useState(false);
    const [isLoading, setLoading] = useState(false);
    const vayuNonce = wpapi.security;


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
        setLoading(true); // Set loading state to true
        fetch(wpapi.ajaxurl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new URLSearchParams({
                action: 'vayu_blocks_install_and_activate_callback',
                plugin_slug: 'vayu-blocks',
                security: vayuNonce,
            }),
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok.');
            }
            const contentType = response.headers.get('content-type');
            if (contentType && contentType.includes('application/json')) {
                return response.json(); // Parse JSON response
            } else {
                return response.text(); // Parse text response
            }
        })
        .then(data => {
            // Check if data is a string (text response)
            if (typeof data === 'string') {
                // If it's a text response, log it and reload the page
                console.log('Text response:', data);
                setbuttonEnable(true);
                setButtonText('Activated');
                setLoading(false); // Set loading state to true
                // window.location.reload(); // Reload the page
            } else {
                // If it's a JSON response, check for success
                if (data && data.success) { 
                    setbuttonEnable(true);
                    setButtonText('Activated');
                    setLoading(false); // Set loading state to true
                    // window.location.reload(); // Reload the page on success
                } else {
                    // Show error message
                    alert('Error: ' + (data ? data : 'Unknown error'));
                }
            }
        })
        .catch(error => {
            console.error('Fetch Error:', error); // Log fetch error
        });
    };
    
    

    return (
        <Fragment>
            <div className="sidebar-option-content-wrp">
               <div className="content-box">
                <h3> { __( 'Vayu Blocks', 'vayu-x' )}</h3>
                <p>{__( 'Ignite your imagination with Vayu Blocks — An innovative tool for creative minds. The Vayu Blocks is an add-on plugin For Gutenberg Block Editor. Quickstart the Gutenberg editor with Powerful and elegant blocks to design stunning websites.', 'vayu-x' )}</p>
                <button className="button button-primary" onClick={handleInstallActivate} disabled={buttonEnable}>
                   
                    {isLoading ? <><FaSpinner className="icon-spin loader" /></> : <span>{buttonText}</span>}
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
