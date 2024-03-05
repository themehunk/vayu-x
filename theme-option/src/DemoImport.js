import {Fragment} from '@wordpress/element';
import { __ } from '@wordpress/i18n';

const DemoImport = () => {
    
    return (
        <Fragment>
            <div className="option-content-wrp">
               <p>{ __('You Can Import Demo','vayu-x') }</p>

            </div>
        </Fragment>
    );
};



export default DemoImport;