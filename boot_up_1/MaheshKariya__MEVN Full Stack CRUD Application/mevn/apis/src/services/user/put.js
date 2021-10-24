import User from '../../models/user';

const byId = async (id, user) => {
  return await User.findByIdAndUpdate(id, user);
};

export default { byId };
