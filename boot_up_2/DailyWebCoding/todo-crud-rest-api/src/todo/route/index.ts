import express, { Request, Response } from 'express';
import { v4 as uuidv4 } from 'uuid';
import { TodoInstance } from '../model';
import TodoValidator from '../validator';
import Middleware from '../../middleware';

const router = express.Router();

router.post(
  '/create',
  TodoValidator.checkCreateTodo(),
  Middleware.handleValidationError,
  async (req: Request, res: Response) => {
    const id = uuidv4();
    try {
      const record = await TodoInstance.create({ ...req.body, id });
      return res.json({ record, msg: 'Successfully create todo' });
    } catch (err) {
      return res.json({ msg: 'fail to create', status: 500, route: '/create' });
    }
  },
);

router.get(
  '/read',
  TodoValidator.checkReadTodo(),
  Middleware.handleValidationError,
  async (req: Request, res: Response) => {
    try {
      const limit = req.query?.limit as number | undefined;
      const offset = req.query?.offset as number | undefined;
      const records = await TodoInstance.findAll({ where: {}, limit, offset });
      return res.json(records);
    } catch (err) {
      return res.json({ msg: 'fail to read', status: 500, route: '/read' });
    }
  },
);

router.get(
  '/read/:id',
  TodoValidator.checkIdParam(),
  Middleware.handleValidationError,
  async (req: Request, res: Response) => {
    try {
      const { id } = req.params;
      const record = await TodoInstance.findOne({ where: { id } });
      res.json(record);
    } catch (err) {
      return res.json({ msg: 'fail to read', status: 500, route: '/read/:id' });
    }
  },
);

router.put(
  '/update/:id',
  TodoValidator.checkIdParam(),
  Middleware.handleValidationError,
  async (req: Request, res: Response) => {
    try {
      const { id } = req.params;
      const record = await TodoInstance.findOne({ where: { id } });
      if (!record) {
        return res.json({ msg: 'Can not find existing record' });
      }
      const updatedRecord = await record.update({
        completed: !record.getDataValue('completed'),
      });
      return res.json({ record: updatedRecord });
    } catch (err) {
      return res.json({
        msg: 'fail to update',
        status: 500,
        route: '/update/:id',
      });
    }
  },
);

router.delete(
  '/delete/:id',
  TodoValidator.checkIdParam(),
  Middleware.handleValidationError,
  async (req: Request, res: Response) => {
    try {
      const { id } = req.params;
      const record = await TodoInstance.findOne({ where: { id } });
      if (!record) {
        return res.json({ msg: 'Can not find existing record' });
      }
      const deletedRecord = await record.destroy();
      return res.json({ record: deletedRecord });
    } catch (err) {
      return res.json({
        msg: 'fail to delete',
        status: 500,
        route: '/del/:id',
      });
    }
  },
);

export default router;
