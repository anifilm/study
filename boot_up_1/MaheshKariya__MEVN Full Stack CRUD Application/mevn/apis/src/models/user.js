import mongoose from 'mongoose';
import bcrypt from 'bcryptjs';

const salt = bcrypt.genSaltSync(10);

const User = mongoose.model(
  'user',
  new mongoose.Schema({
    name: String,
    email: String,
    password: String,
    createdAt: Date,
    updatedAt: Date
  }).pre('save', function (next) {
    this.password = bcrypt.hashSync(this.password, salt);
    console.log(this.password);
    next();
  })
);

export default User;
