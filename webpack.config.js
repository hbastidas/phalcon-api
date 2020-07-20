const path = require('path');

module.exports = {
  entry: './src-api-client/apiclient.js',
  output: {
    path: path.resolve(__dirname, 'public/js'),
    filename: 'main.js'
  }
};
