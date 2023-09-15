import { registerPlugin } from '@wordpress/plugins';
import { PluginSidebar, PluginSidebarMoreMenuItem } from '@wordpress/edit-post';

import { __ } from '@wordpress/i18n';
import { withSelect, withDispatch } from '@wordpress/data';
import { compose } from '@wordpress/compose';

const VayuLogoIcon = {
	logo: (
	  <svg
		xmlns="http://www.w3.org/2000/svg"
		xmlnsXlink="http://www.w3.org/1999/xlink"
		width="50"
		zoomAndPan="magnify"
		viewBox="0 0 37.5 37.499999"
		height="50"
		preserveAspectRatio="xMidYMid meet"
		version="1.0"
	  >
		<defs>
		  <clipPath id="ca2c23bf80">
			<path d="M 2.488281 10 L 11 10 L 11 18 L 2.488281 18 Z M 2.488281 10 " clipRule="nonzero" />
		  </clipPath>
		  <clipPath id="2979852e38">
			<path d="M 2.488281 3 L 34.738281 3 L 34.738281 19 L 2.488281 19 Z M 2.488281 3 " clipRule="nonzero" />
		  </clipPath>
		</defs>
		<path fill="#001327" d="M 19.703125 14.035156 L 14.796875 22.652344 L 12.59375 18.789062 C 11.007812 19.628906 9.507812 20.195312 8.160156 20.285156 L 14.796875 31.929688 L 28.160156 8.464844 C 25.660156 9.589844 22.710938 11.8125 19.703125 14.035156 " fillOpacity="1" fillRule="nonzero" />
		<g clipPath="url(#ca2c23bf80)">
		  <path fill="#001327" d="M 10.546875 15.195312 L 7.773438 10.328125 L 2.484375 10.328125 L 6.355469 17.117188 C 7.566406 16.878906 8.992188 16.167969 10.546875 15.195312 " fillOpacity="1" fillRule="nonzero" />
		</g>
		<g clipPath="url(#2979852e38)">
		  <path fill="#6c1bc3" d="M 2.484375 12.199219 C 6.414062 33.921875 31.628906 -6.605469 34.734375 10.546875 C 30.5625 -12.511719 5.195312 27.179688 2.484375 12.199219 " fillOpacity="1" fillRule="nonzero" />
		</g>
	  </svg>
	),
  };
  

  
  
  
  

  
  

  
  

  
  

  

const PageSettings = ( props ) => {
	return (
		<>
			{ /* Page Settings Icon. */ }
			<PluginSidebarMoreMenuItem
				target="vayu-page-settings-panel"
				icon={ VayuLogoIcon.logo }
				className={ 'vayu-x-logo' }
			>
				{ __( 'Page Settings', 'vayu-x' ) }
			</PluginSidebarMoreMenuItem>

			{ /* Page Settings Area. */ }
			<PluginSidebar
				isPinnable={ true }
				icon={ VayuLogoIcon.logo }
				name="vayu-page-settings-panel"
				title={ __( 'Vayu X Page Settings', 'vayu-x' ) }
				className={ 'vayu-x-page-sidebar' }
			>
				
			</PluginSidebar>
		</>
	);
};
registerPlugin('vayu-x-page-settings', {
    render: PageSettings,
});

export default compose(
	withSelect( ( select ) => {
		const postMeta = select( 'core/editor' ).getEditedPostAttribute( 'meta' );
		const oldPostMeta =
			select( 'core/editor' ).getCurrentPostAttribute( 'meta' );
		return {
			meta: { ...oldPostMeta, ...postMeta },
			oldMeta: oldPostMeta,
		};
	} ),
	withDispatch( ( dispatch ) => ( {
		setMetaFieldValue: ( value, field ) =>
			dispatch( 'core/editor' ).editPost( {
				meta: { [ field ]: value },
			} ),
	} ) )
)( PageSettings );