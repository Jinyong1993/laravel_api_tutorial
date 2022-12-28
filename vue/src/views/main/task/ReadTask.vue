<template>
  <v-card>
    <v-card-title>詳細（{{task.task_name}} ID:{{task.task_id}}）</v-card-title>
    <v-card-text class="px-4">
      <v-card-subtitle>タスク情報</v-card-subtitle>
      <section>
        <ul>
          <li class="mb-3">
            <v-text-field :value="task.task_name" label="タスク名" dense outlined color="primary" readonly></v-text-field>
          </li>
          <li class="mb-3">
            <v-textarea :value="task.task_detail" label="詳細" dense outlined color="primary" readonly></v-textarea>
          </li>
        </ul>
      </section>
    </v-card-text>
    <v-card-actions>
      <v-spacer></v-spacer>
      <v-btn @click="$router.push(`/main/task/update?taskId=${task.task_id}`)" class="orange white--text">
        <span>編集</span>
        <v-icon>mdi-pencil</v-icon>
      </v-btn>
    </v-card-actions>
  </v-card>
</template>
<script>
import axios from "axios";
export default {
  data() {
    return {
      task: {
        task_id: 1,
        task_name: "1番目のタスク（dummy）",
        task_detail:
          "1番目のタスクの詳細（dummy）1番目のタスクの詳細（dummy）1番目のタスクの詳細（dummy）1番目のタスクの詳細（dummy）1番目のタスクの詳細（dummy）1番目のタスクの詳細（dummy）",
      },
    };
  },
  methods: {
    getTask() {
      const requestConfig = {
        url: "http://localhost:8001/api/task",
        method: "GET",
        params: {
          id: this.$route.query.taskId,
        },
      };
      axios(requestConfig)
        .then((res) => {
          console.log(res);
          this.task = res.data;
        })
        .catch(() => {
          alert("エラー");
        });
    },
  },
  mounted() {
    this.getTask();
  },
};
</script>