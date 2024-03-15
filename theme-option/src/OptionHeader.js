import {Fragment} from '@wordpress/element';
import { __ } from '@wordpress/i18n';

const OptionHeader = () => {
    return (
        <Fragment>
        <div className="blockline-theme-options-header">
       
              <div className="th-logo-img">
                        <a target="_blank" href="https://themehunk.com/" > 
                        <span className="logo-image">
                         <img className="logo-img" src={`${wpapi.vayuUri}/theme-option/assets/img/logo-themehunk.png`}></img>
                         </span>
                        </a>
              </div> 
             
          <div className="th-option-area">
           <div className="th-option-top-hdr">
              <div className="th-col2">
                    <div className="th-option-heading">
                       <h2>{sprintf(__( 'Welcome To %s Theme', 'vayu-x' ), wpapi.themeName)}</h2>
                       <p>{wpapi.themeName} {__( 'Multipurpose WordPress Full Site Editing Theme', 'vayu-x' )}</p>
                    </div>
                    <div className="th-option-detail">
                        <p className="th-version">{__( 'Version ', 'vayu-x' )} {wpapi.themeVersion} </p>
                        <span>{__( 'Free', 'vayu-x' )}</span>
                    </div>
              </div>
            </div>

            
          </div>
        </div>
        </Fragment>
    );
  };
  
export default OptionHeader;