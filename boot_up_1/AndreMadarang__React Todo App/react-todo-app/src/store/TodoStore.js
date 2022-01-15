import React from 'react';
import { observable, action, computed, configure, runInAction } from 'mobx';
import axios from 'axios';
axios.defaults.baseURL = 'http://todo-laravel.test/api';
configure({ enforceActions: true });

class TodoStore {
  @observable todoInput = React.createRef();
  @observable filter = 'all';
  @observable beforeEditCache = '';
  @observable todos = [];
}

const store = new TodoStore();
export default store;
