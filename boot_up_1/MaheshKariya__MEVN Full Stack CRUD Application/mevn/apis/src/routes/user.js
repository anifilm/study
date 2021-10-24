import { Router } from 'express';
import UserController from '../controllers/user';

const User = Router();

User.get('/', UserController.fetchUsers);

export default User;
