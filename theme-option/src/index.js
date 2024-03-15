import { render, Fragment, Component } from '@wordpress/element';
import { __ } from '@wordpress/i18n';
import OptionPanel from './OptionPanel';
import './style.css';

class Vayu_X__option_panel extends Component {
    render() {
        return (
            <Fragment>
                <OptionPanel />
            </Fragment>
        );
    }

}

document.addEventListener( "DOMContentLoaded", function(event) {
    render(
        <Vayu_X__option_panel />,
        document.getElementById( 'blockline-theme-setting-page' )
        )
    }
);