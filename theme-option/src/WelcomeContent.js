import {Fragment} from '@wordpress/element';
import { __ } from '@wordpress/i18n';

const WelcomeContent = () => {
    let url_customize = `${wpapi.homeUrl}/wp-admin/site-editor.php`;
    return (
        <Fragment>
            <div className="option-content-wrp">
               <div className="content-box-full">
                {/* <h3> {__( 'Welcome to Vayu X. Here is a short video to look over its features and uses. ', 'vayu-x' )}</h3>
                <video width="320" height="240" controls>
                <source src={`${wpapi.vayuUri}/theme-option/assets/img/video2.mp4`} type="video/mp4" />

                </video> */}
                <p>{__( 'Create beautiful website using Vayu X Full Site Editing Theme. It allows you to customize your site, including individual blocks, as much as you’d like with different colors, typography, layouts, and more.', 'vayu-x' )}
                
                </p>
                <a href={url_customize} className="content-link button">{__('Start Customizing Vayu','vayu-x')}</a>
               </div>
            </div>
        </Fragment>
    );
};

export default WelcomeContent;