const path = require('path');
const defaultConfig = require('@wordpress/scripts/config/webpack.config');
const { getWebpackEntryPoints } = require('@wordpress/scripts/utils/config');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');

module.exports = {
	...defaultConfig,
	entry: {
		...getWebpackEntryPoints(),
		index: './src'
	},
	module: {
		rules: [
			{
				test: /\.js$|jsx/,
				exclude: /node_modules/,
				use: {
					loader: 'babel-loader',
					options: {
						presets: ['@babel/preset-env', '@babel/preset-react']
					}
				}
			},
			{
				test: /\.css$/i,
				use: [MiniCssExtractPlugin.loader, 'css-loader', 'postcss-loader']
			}
		]
	},
	plugins: [
		new MiniCssExtractPlugin({
			filename: 'style.css'
		})
	],
	resolve: {
		extensions: ['.js', '.jsx']
	}
};