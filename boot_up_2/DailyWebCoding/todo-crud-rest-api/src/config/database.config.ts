import { Sequelize } from 'sequelize';

const db = new Sequelize('app', 'user', 'password', {
  storage: './database.sqlite',
  dialect: 'sqlite',
  logging: false,
});

export default db;
