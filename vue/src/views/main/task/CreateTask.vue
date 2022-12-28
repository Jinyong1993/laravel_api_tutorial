<template>
  <v-card>
    <v-card-title>
      <span>タスク 登録</span>
    </v-card-title>
    <v-card-text class="px-4">
      <v-card-subtitle>タスク情報</v-card-subtitle>
      <section>
        <ul>
          <li class="mb-3">
            <v-text-field label="タスク名" :value="newTaskName" @input="onCreateName" dense outlined color="primary"></v-text-field>
          </li>
          <li class="mb-3">
            <v-textarea label="詳細" :value="newTaskDetail" @input="onCreateDetail" dense outlined color="primary"></v-textarea>
          </li>
        </ul>
      </section>
    </v-card-text>
    <v-card-actions>
      <v-spacer></v-spacer>
      <v-btn color="primary" @click="createTask()">
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
      newTaskName: "",
      newTaskDetail: "",
    };
  },
  methods: {
    onCreateName(userName) {
      this.newTaskName = userName;
    },
    onCreateDetail(userDetail) {
      this.newTaskDetail = userDetail;
    },
    createTask() {
      const requestConfig = {
        url: "http://localhost:8001/api/task",
        method: "POST",
        data: {
          name: this.newTaskName,
          detail: this.newTaskDetail,
        },
      };
      axios(requestConfig)
        .then(() => {
          alert("成功");
        })
        .catch(() => {
          alert("エラー");
        });
    },
  },
};
</script>