import express, { Request, Response, NextFunction } from 'express';
import db from './config/database.config';
import { v4 as uuidv4 } from 'uuid';
import { TodoInstance } from './todo/model';
import TodoValidator from './todo/validator';
import { validationResult } from 'express-validator';

db.sync().then(() => {
  console.log('connect to db');
});

const app = express();
const port = 8080;

app.use(express.json());

app.get('/', (req: Request, res: Response) => {
  return res.send('hello world');
});

app.post(
  '/create',
  TodoValidator.checkCreateTodo(), (req: Request, res: Response, next: NextFunction) => {
    const error = validationResult(req);
    if (!error.isEmpty()) {
      return res.json(error);
    }
    next();
  },
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

app.listen(port, () => {
  console.log(`server is running on port ${port}`);
});
