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
                <p>{__( 'Vayu X Theme: Tailored for beginners, it seamlessly integrates with WordPress’s block editor, simplifying website creation. Its intuitive interface guides users through adding text, images, and typography effortlessly with advance editor. Enhance your site with customizable blocks and responsive design, ensuring optimal viewing on all devices. Built-in customization options let you personalize colors, fonts, and layouts, while comprehensive support ensures assistance at every stage. Unleash your website-building potential with Vayu X.', 'vayu-x' )}
                
                </p>
                <a href={url_customize} className="content-link button">{__('Start Customizing Vayu','vayu-x')}</a>
               </div>
            </div>
        </Fragment>
    );
};

export default WelcomeContent;