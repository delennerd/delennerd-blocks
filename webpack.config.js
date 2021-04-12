const defaultConfig = require("@wordpress/scripts/config/webpack.config");
const path = require('path');

module.exports = {
	...defaultConfig,
	entry: {
		'blocks': './src/blocks/blocks.js'
	},
	output: {
		path: path.join(__dirname, './dist'),
		filename: '[name].js'
	}
}