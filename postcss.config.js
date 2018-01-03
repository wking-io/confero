/* eslint global-require: 0 */
/* eslint import/no-extraneous-dependencies: 0 */
module.exports = ({ options, env }) => ({
  parser: 'postcss-scss',
  plugins: [
    require('autoprefixer')(env === 'production' ? options.autoprefixer : false),
    require('cssnano')(env === 'production' ? options.cssnano : false),
    require('tailwindcss')('./tailwind.js'),
  ],
});
