import {Fragment} from '@wordpress/element';
import { __ } from '@wordpress/i18n';

const SidebarContent = () => {
    return (
        <Fragment>
            <div className="sidebar-option-content-wrp">
               <div className="content-box">
                <h3> { __( 'Vayu Blocks', 'vayu-x' )}</h3>
                <p>{__( 'Ignite your imagination with Vayu Blocks — An innovative tool for creative minds. The Vayu Blocks is an add-on plugin For Gutenberg Block Editor. Quickstart the Gutenberg editor with Powerful and elegant blocks to design stunning websites.', 'vayu-x' )}</p>
                <a href="https://themehunk.com/templates/blockline-pro/" target="_blank" className="content-link button"> {__( 'Upgrade To Pro', 'vayu-x' )}</a>
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