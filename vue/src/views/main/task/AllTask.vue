<template>
  <v-card>
    <v-card-title>
      <span>タスク 一覧</span>
      <v-spacer></v-spacer>
      <v-btn router to="/main/task/create" height="35px" width="35px" fab>
        <v-icon color="primary">mdi-plus</v-icon>
      </v-btn>
    </v-card-title>
    <v-card-text class="pa-0">
      <div class="task_list">
        <v-divider></v-divider>
        <v-simple-table>
          <thead>
            <tr>
              <th>ID</th>
              <th>タスク名</th>
            </tr>
          </thead>
          <tbody>
            <tr @click="$router.push(`/main/task/read?taskId=${task.task_id}`)" v-ripple v-for="(task,index) in tasks" :key="index">
              <td>{{task.task_id}}</td>
              <td>{{task.task_name}}</td>
            </tr>
          </tbody>
        </v-simple-table>
      </div>
    </v-card-text>
  </v-card>
</template>

<script>
export default {
  data() {
    return {
      tasks: [
        {
          task_id: 1,
          task_name: "1番目のタスク（dummy）",
        },
        {
          task_id: 2,
          task_name: "2番目のタスク（dummy）",
        },
        {
          task_id: 3,
          task_name: "3番目のタスク（dummy）",
        },
      ],
    };
  },
  methods: {
  },
  mounted() {
  },
};
</script>