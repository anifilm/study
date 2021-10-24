import { Router } from 'express';
import UserController from '../controllers/user';

const User = Router();

User.get('/', UserController.getUsers);
User.get('/:id', UserController.getUserById);
User.post('/', UserController.createUser);
User.put('/:id', UserController.updateUserById);
User.delete('/:id', UserController.deleteUser);

export default User;
