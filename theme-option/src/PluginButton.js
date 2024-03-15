import {useState, useEffect} from '@wordpress/element';

function PluginButton({ pluginSlug }) {
    const [buttonText, setButtonText] = useState('Loading');
    const [buttonDisabled, setButtonDisabled] = useState(true);
    const [customClass, setcustomClass] = useState('Loading');

const getPluginStatusNonce = wpapi.getPluginStatusNonce;
const installAndActivatePluginNonce = wpapi.installAndActivatePluginNonce;


const ajaxUrl = wpapi.ajaxurl;

    useEffect(() => {
        // Fetch plugin status
        const fetchPluginStatus = async () => {
            const response = await fetch(`${ajaxUrl}?action=get_plugin_status_callback`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: new URLSearchParams({
                    plugin_slug: pluginSlug,
                    security: getPluginStatusNonce,
                }).toString(),
            });

            if (response.ok) {
                const data = await response.json();
                if (data.success) {
                    const status = data.data.status;
                    if (status === 'not_installed') {
                        setButtonText('Install');
                        setcustomClass('install-now');
                        setButtonDisabled(false);
                    } else if (status === 'installed_not_activated') {
                        setButtonText('Active Now');
                        setcustomClass('active-now');
                        setButtonDisabled(false);
                    } else if (status === 'installed_and_activated') {
                        setButtonText('Activated');
                        setcustomClass('activated');
                        setButtonDisabled(true);
                    }
                }
            }
        };

        fetchPluginStatus();
    }, [pluginSlug]);

    const handleButtonClick = async () => { console.log(installAndActivatePluginNonce);
        const response = await fetch(`${ajaxUrl}?action=install_and_activate_plugin_callback`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new URLSearchParams({
                plugin_slug: pluginSlug,
                security: installAndActivatePluginNonce,
            }).toString(),
        });

        if (response.ok) { 
            const data = await response.json();
            if (data.success) {
                setButtonText('Activated');
                setButtonDisabled(true);
                alert('Plugin installed and activated successfully!');
            } else {
                alert('Error: ' + data.message);
            }
        }
    };

    return (
        <button className={`custom-button button ${customClass}`} onClick={handleButtonClick} disabled={buttonDisabled}>
            {buttonText}
        </button>
    );
}

export default PluginButton;
