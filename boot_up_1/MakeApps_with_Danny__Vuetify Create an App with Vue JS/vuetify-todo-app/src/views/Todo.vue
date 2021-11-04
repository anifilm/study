<template>
  <div class="Home px-4 mt-5">
    <v-text-field
      v-model="newTaskTitle"
      v-on:append="addTask"
      v-on:keyup.enter="addTask"
      outlined
      clearable
      label="Add Task"
      append-icon="mdi-plus"
      hide-details
    ></v-text-field>

    <v-list two-line flat class="mt-3">
      <v-list-item-group multiple v-for="task in tasks" v-bind:key="task.id">
        <v-list-item v-on:click="doneTask(task.id)" v-bind:class="{ 'blue lighten-5': task.done }">
          <template v-slot:default>
            <v-list-item-action>
              <v-checkbox v-bind:input-value="task.done" color="primary"></v-checkbox>
            </v-list-item-action>

            <v-list-item-content>
              <v-list-item-title v-bind:class="{ 'text-decoration-line-through': task.done }">
                {{ task.title }}
              </v-list-item-title>
            </v-list-item-content>

            <v-list-item-action>
              <v-btn v-on:click.stop="deleteTask(task.id)" icon>
                <v-icon color="red lighten-1">mdi-delete</v-icon>
              </v-btn>
            </v-list-item-action>
          </template>
        </v-list-item>
        <v-divider></v-divider>
      </v-list-item-group>
    </v-list>
  </div>
</template>

<script>
export default {
  name: 'Todo',
  data() {
    return {
      newTaskTitle: '',
      tasks: [
        {
          id: 1,
          title: '아침먹기',
          done: true
        },
        {
          id: 2,
          title: '점심먹기',
          done: false
        },
        {
          id: 3,
          title: '저녁먹기',
          done: false
        }
      ]
    };
  },
  methods: {
    addTask() {
      if (this.newTaskTitle.trim() !== '') {
        let newTask = {
          id: Date.now(),
          title: this.newTaskTitle.trim(),
          done: false
        }
        this.tasks.push(newTask);
      }
      this.newTaskTitle = '';
    },
    doneTask(id) {
      let task = this.tasks.filter((task) => {
        return id === task.id;
      })[0];
      task.done = !task.done;
    },
    deleteTask(id) {
      this.tasks = this.tasks.filter((task) => {
        return id !== task.id;
      });
    }
  }
};
</script>
