import express from 'express';
import cors from 'cors';
import dotenv from 'dotenv';
dotenv.config();

import config from './src/config';

import User from './src/routes/user';

const app = express();

const port = process.env.PORT || '3000';
app.set('port', port);

app.use(express.json());
app.use(express.urlencoded({ extended: true }));
app.use(cors());

app.use('/users', User);

app.listen(port, function () {
  console.log(`The server is running, please open your browser at http://localhost:${port}\n`);
});
