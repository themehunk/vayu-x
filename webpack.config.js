const defaultConfig = require( '@wordpress/scripts/config/webpack.config' );

module.exports = () => {
	return {
		...defaultConfig,

		module: {
			...defaultConfig.module,
		},

		entry: {
			registerEditorSettings: './register-editor-settings.js'
		},

		plugins: [ ...defaultConfig.plugins ],
	};
};
