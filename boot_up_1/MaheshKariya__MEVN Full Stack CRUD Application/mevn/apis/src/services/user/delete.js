import User from '../../models/user';

const byId = async (id) => {
  return await User.findByIdAndDelete(id);
};

export default { byId };
