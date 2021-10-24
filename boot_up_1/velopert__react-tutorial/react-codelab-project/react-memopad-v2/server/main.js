import express from 'express';
import path from 'path';

import morgan from 'morgan'; // HTTP REQUEST LOGGER
import bodyParser from 'body-parser'; // PARSE HTML BODY

import mongoose from 'mongoose';
import session from 'express-session';

import dotenv from 'dotenv';
dotenv.config();

const userId = process.env.USER_ID;
const userPw = process.env.USER_PW;

/* mongodb connection */
mongoose
  .connect(
    `mongodb+srv://${userId}:${userPw}@cluster0.ehk3h.mongodb.net/MEVNFullStackCRUDApp?retryWrites=true&w=majority`,
    {
      useNewUrlParser: true,
      useUnifiedTopology: true,
    },
  )
  .then(() => {
    console.log('MongoDB connecting Success!!');
  })
  .catch((e) => {
    console.log(e);
  });

import api from './routes';

const app = express();

const port = process.env.PORT || '4000';
app.set('port', port);

app.use(morgan('dev'));
app.use(bodyParser.json());

/* use session */
app.use(session({
  secret: 'dev',
  resave: false,
  saveUninitialized: true
}));

app.use('/', express.static(path.join(__dirname, './../dist')));

app.get('/hello', (req, res) => {
  return res.send('Hello CodeLab');
});

/* setup routers & static directory */
app.use('/api', api);

app.get('*', (req, res) => {
  res.sendFile(path.resolve(__dirname, './../dist/index.html'));
});

/* handle error */
app.use(function (err, req, res, next) {
  console.error(err.stack);
  res.status(500).send('Something broke!');
});

app.listen(port, () => {
  console.log(`Express is listening on http://localhost:${port}\n`);
});
