import postUserService from '../services/user/post';
import getUserService from '../services/user/get';
import putUserService from '../services/user/put';
import deleteUserService from '../services/user/delete';

const getUsers = async (req, res) => {
  try {
    res.status(200).json(await getUserService.all());
  } catch (e) {
    res.status(500).json(e);
  }
};

const getUserById = async (req, res) => {
  try {
    res.status(200).json(await getUserService.byId(req.params.id));
  } catch (e) {
    res.status(500).json(e);
  }
};

const createUser = async (req, res) => {
  try {
    console.log(req.body);
    const { name, email, password } = req.body;
    const newUser = await postUserService.create({
      name,
      email,
      password
    });
    res.status(200).json(newUser);
  } catch (e) {
    res.status(500).json(e);
  }
};

const updateUserById = async (req, res) => {
  try {
    const { name, email, password } = req.body;
    const updateUserById = await putUserService.byId(req.params.id, {
      name,
      email,
      password
    });
    res.status(200).json(updateUserById);
  } catch (e) {
    res.status(500).json(e);
  }
};

const uploadProfilePicture = (req, res) => {
  console.log(req.file.originalname);
  console.log(req.file.originalname);
  res.json(req.body);
};

const deleteUser = async (req, res) => {
  try {
    const userDeleted = await deleteUserService.byId(req.params.id);
    res.status(200).json({ userDeleted });
  } catch (e) {
    res.status(500).json(e);
  }
};

const login = async (req, res) => {
  try {
    const { email, password } = req.body;
    const loggedin = await getUserService.byEmailAndPassword(email, password);
    // await client.set(email, loggedin)
    res.status(200).json(loggedin);
  } catch (e) {
    res.status(500).json(e);
  }
};

export default {
  getUsers,
  getUserById,
  createUser,
  updateUserById,
  uploadProfilePicture,
  deleteUser,
  login
};
