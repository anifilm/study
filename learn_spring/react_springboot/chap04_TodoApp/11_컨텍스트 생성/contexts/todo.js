import { createContext } from 'react';

const TodoContext = createContext({
  state: {
    todos: [],
    input: '',
  },
  actions: {
    setTodos: () => {},
    onInsert: () => {},
    onRemove: () => {},
    onToggle: () => {},
    onClearAll: () => {},
    onChange: () => {},
    onSubmit: () => {},
  },
});

export default TodoContext;
