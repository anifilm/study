const HtmlWebpackPlugin = require('html-webpack-plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');

const port = process.env.PORT || 3000;

module.exports = {
  // 개발환경
  mode: 'development',
  // 애플리케이션 시작 경로
  entry: './src/index.js',
  // 번들된 파일 경로
  output: {
    filename: 'bundle.[hash].js',
    path: __dirname + '/dist',
  },
  module: {
    rules: [
      {
        test: /\.(js|jsx)$/,
        exclude: /node_modules/,
        use: {
          loader: 'babel-loader',
        },
      },
      {
        test: /\.css$/,
        use: [MiniCssExtractPlugin.loader, 'css-loader'],
      },
      {
        test: /\.html$/,
        use: [
          {
            loader: 'html-loader',
            options: {
              minimize: true,
            },
          },
        ],
      },
    ],
  },
  plugins: [
    new HtmlWebpackPlugin({
      template: 'public/index.html',
    }),
    new MiniCssExtractPlugin({
      filename: 'style.css',
    }),
    new CleanWebpackPlugin(),
  ],
  // 개발 서버 설정
  devServer: {
    host: 'localhost',
    port: port,
    open: true,
  },
};
