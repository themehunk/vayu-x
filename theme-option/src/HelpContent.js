import {Fragment} from '@wordpress/element';
import { __ } from '@wordpress/i18n';

const HelpContent = () => {
    return (
        <Fragment>
            <div className="option-content-wrp">
               <div className="content-box">
                <h3> {__( 'Contact Support', 'vayu-x' )}</h3>
                <p>{__( 'If you need any help you can contact to our support team', 'vayu-x' )}</p>
                <a href="https://themehunk.com/contact-us/" target="_blank" className="content-link "> {__( 'Need help...', 'vayu-x' )}</a>
               </div>
               <div className="content-box">
                <h3> {__( 'Documentation', 'vayu-x' )}</h3>
                <p>{__( 'Our WordPress Theme is well documented, you can go with our documentation and learn to customize Big Store.', 'vayu-x' )}</p>
                
                <a href="https://themehunk.com/docs/" target="_blank" className="content-link "> {__( 'Go to Doc', 'vayu-x' )}</a>
               </div>
               <div className="content-box">
                <h3> {__( 'Create a child theme', 'vayu-x' )}</h3>
                <p>{__( 'Before modifying theme core files. You should create child theme to make those changes update proof. Please follow this link to create child theme.', 'vayu-x' )}</p>
                <a href="https://themehunk.com/child-theme/" target="_blank" className="content-link "> {__( 'Create Child Theme', 'vayu-x' )}</a>
               </div>
               <div className="content-box">
                <h3> {__( 'Join Group', 'vayu-x' )}</h3>
                <p>{__( 'Join the community of friendly ThemeHunk users. Get connected, share opinion, ask questions and help each other !', 'vayu-x' )}</p>
                <a href="https://linktr.ee/themehunk" target="_blank" className="content-link button"> {__( 'Join Our Social Group', 'vayu-x' )}</a>
               </div>
            </div>
        </Fragment>
    );
};

export default HelpContent;