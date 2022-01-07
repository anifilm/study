import express, { Request, Response, NextFunction } from 'express';
import db from './config/database.config';
import { v4 as uuidv4 } from 'uuid';
import { TodoInstance } from './todo/model';
import TodoValidator from './todo/validator';
import Middleware from './middleware';

db.sync().then(() => {
  console.log('connect to db');
});

const app = express();
const port = 8080;

app.use(express.json());

app.post(
  '/create',
  TodoValidator.checkCreateTodo(), Middleware.handleValidationError,
  async (req: Request, res: Response) => {
    //console.log(req.body);
    const id = uuidv4();
    try {
      const record = await TodoInstance.create({ ...req.body, id });
      return res.json({ record, msg: 'Successfully create todo' });
    } catch (err) {
      return res.json({ msg: 'fail to create', status: 500, route: '/create' });
    }
  },
);

app.get('/read', async (req: Request, res: Response) => {
  try {
    const records = await TodoInstance.findAll({ where: {} });
    return res.json(records);
  }
  catch (err) {
    return res.json({ msg: 'fail to read', status: 500, route: '/read' });
  }
});

app.listen(port, () => {
  console.log(`server is running on port ${port}`);
});
