<template>
  <v-card>
    <v-card-title>編集（{{task.task_name}} ID:{{task.task_id}}）</v-card-title>
    <v-card-text class="px-4">
      <v-card-subtitle>タスク情報</v-card-subtitle>
      <section>
        <ul>
          <li class="mb-3">
            <v-text-field :value="task.task_name" @input="onUpdateName" label="タスク名" dense outlined color="primary"></v-text-field>
          </li>
          <li class="mb-3">
            <v-textarea :value="task.task_detail" @input="onUpdateDetail" label="詳細" dense outlined color="primary"></v-textarea>
          </li>
        </ul>
      </section>
    </v-card-text>
    <v-card-actions>
      <v-btn color="error">
        <span>削除</span>
        <v-icon>mdi-delete</v-icon>
      </v-btn>
      <v-spacer></v-spacer>
      <v-btn color="primary">
        <span>登録</span>
        <v-icon>mdi-send</v-icon>
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
      newTaskName: "",
    };
  },
  methods: {
    onUpdateName(taskName) {
      this.task.task_name = taskName;
    },
    onUpdateDetail(taskDetail) {
      this.task.task_detail = taskDetail;
    },
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