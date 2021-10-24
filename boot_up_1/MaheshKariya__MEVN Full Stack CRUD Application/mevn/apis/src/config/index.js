import dotenv from 'dotenv';
dotenv.config();

const userId = process.env.USER_ID;
const userPw = process.env.USER_PW;

import mongoose from 'mongoose';
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
