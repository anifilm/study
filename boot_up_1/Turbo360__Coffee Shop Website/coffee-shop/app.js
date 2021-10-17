// Full Documentation - https://docs.turbo360.co
const vertex = require('vertex360')({ site_id: process.env.TURBO_APP_ID });
const express = require('express');
const nunjucks = require('nunjucks');

const app = express(); // initialize app

/*  Apps are configured with settings as shown in the conig object below.
    Options include setting views directory, static assets directory,
    and database settings. Default config settings can be seen here:
    https://docs.turbo360.co */

const config = {
  views: 'views', // Set views directory
  static: 'public', // Set static assets directory
  logging: true

  /*  To use the Turbo 360 CMS, from the terminal run
      $ turbo extend cms
      then uncomment line 21 below: */

  // db: vertex.nedb()
};

// view engine setup
app.set('view engine', 'html');
nunjucks.configure(config.views, {
  autoescape: true,
  express: app, // app 객체 연결
  watch: true,  // HTML 파일이 변경될 때 템플릿 엔진을 다시 렌더링함
});

vertex.configureApp(app, config);

const main = require('./routes/main');
app.use('/', main);

module.exports = app;
