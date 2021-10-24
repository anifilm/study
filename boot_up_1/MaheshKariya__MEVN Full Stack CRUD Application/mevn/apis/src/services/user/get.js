import User from '../../models/user';
import jwt from 'jsonwebtoken';
import bcrypt from 'bcryptjs';

const all = async () => {
  return await User.find({});
};

const byId = async (_id) => {
  return await User.find({ _id });
};

const byEmailAndPassword = async (email, password) => {
  const user = await User.findOne({ email });
  return bcrypt.compareSync(password, user.password)
    ? {
        secret: jwt.sign(
          {
            id: user._id,
            name: user.name,
            email: user.email
          },
          process.env.SECRET
        )
      }
    : { secret: null };
};

export default {
  all,
  byId,
  byEmailAndPassword
};
