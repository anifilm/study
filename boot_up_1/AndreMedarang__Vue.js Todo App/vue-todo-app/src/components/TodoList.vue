<template>
  <div>
    <input
      type="text"
      class="todo-input"
      placeholder="What needs to bo done"
      v-model="newTodo"
      @keyup.enter="addTodo"
    />
    <div v-for="(todo, index) in todos" :key="todo.id" class="todo-item">
      <div>{{ todo.id }} {{ todo.title }}</div>
      <div class="remove-item" @click="removeTodo(index)">&times;</div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'todo-list',
  data() {
    return {
      newTodo: '',
      todos: [
        {
          id: 1,
          title: 'Finish Vue Screencast',
          completed: false
        },
        {
          id: 2,
          title: 'Take over world',
          completed: false
        },
        {
          id: 3,
          title: 'Hello Vue',
          completed: false
        }
      ]
    };
  },
  methods: {
    addTodo() {
      if (this.newTodo.trim().length === 0) {
        this.newTodo = '';
        return;
      }
      this.todos.push({
        id: this.todos.length + 1,
        title: this.newTodo.trim(),
        completed: false
      });
      this.newTodo = '';
    },
    removeTodo(index) {
      this.todos.splice(index, 1);
    }
  }
};
</script>

<style lang="scss">
.todo-input {
  width: 100%;
  padding: 10px 18px;
  font-size: 18px;
  margin-bottom: 16px;
  &:focus {
    outline: 0;
  }
}
.todo-item {
  margin-bottom: 12px;
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.remove-item {
  cursor: pointer;
  margin-left: 14px;
  &:hover {
    color: red;
  }
}
</style>
