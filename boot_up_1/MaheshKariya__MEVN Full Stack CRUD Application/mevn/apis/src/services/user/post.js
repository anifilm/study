import User from '../../models/user';

const create = async (user) => {
  console.log(user);
  return await User.create(user);
};

export default { create };
