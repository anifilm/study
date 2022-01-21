const express = require('express');
const morgan = require('morgan');
const bodyParser = require('body-parser');

const user = require('./routes/user');

const app = express();

//const myLogger = function (req, res, next) {
//  console.log(req.url);
//  next();
//};

//app.use(myLogger);

app.use(morgan('dev'));
app.use(bodyParser.json());

app.use('/', express.static('public'));

//app.get('/', function (req, res) {
//  res.send('Hello, world!');
//});

app.use('/user', user);

app.listen(3000, function () {
  console.log('Example App listening on port 3000\n');
});
