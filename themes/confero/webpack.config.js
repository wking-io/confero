// Requires
const webpack = require('webpack');
const path = require('path');
const ExtractTextPlugin = require('extract-text-webpack-plugin');

// Plugin Config
const extractCommons = new webpack.optimize.CommonsChunkPlugin({
  name: 'commons',
  filename: 'commons.js',
});
const extractCSS = new ExtractTextPlugin('[name].bundle.css');

const config = {
  context: path.resolve(__dirname, 'src'),
  entry: {
    main: './js/main.js',
    bio: './js/bio.js',
    home: './js/home.js',
    portfolio: './js/portfolio.js',
    contact: './js/contact.js',
  },
  output: {
    path: path.resolve(__dirname, 'dist'),
    filename: '[name].bundle.js',
  },
  devtool: 'source-map',
  module: {
    rules: [
      {
        test: /\.js$/,
        enforce: 'pre',
        loader: 'eslint-loader',
        options: {
          emitWarnings: true,
        },
      },
      {
        test: /\.js$/,
        include: path.resolve(__dirname, 'src/js'),
        exclude: /node_modules/,
        use: [
          {
            loader: 'babel-loader',
            options: {
              presets: [['es2015', { modules: false }]],
            },
          },
        ],
      },
      {
        test: /\.scss$/,
        include: path.resolve(__dirname, 'src/scss'),
        use: extractCSS.extract([
          {
            loader: 'css-loader',
            options: {
              importLoaders: 2,
              url: false,
            },
          },
          'postcss-loader',
          'sass-loader',
        ]),
      },
      {
        test: /\.(jpg|png)$/,
        use: [
          {
            loader: 'url-loader',
            options: { limit: 10000 },
          },
        ],
      },
      {
        test: /\.(eot|svg|ttf|woff|woff2|otf)$/,
        use: [
          {
            loader: 'file-loader',
            options: { name: '[name].[ext]' },
          },
        ],
      },
    ],
  },
  plugins: [new webpack.NamedModulesPlugin(), extractCommons, extractCSS],
};

module.exports = config;
