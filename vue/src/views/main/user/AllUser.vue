<template>
  <div>
    <v-card>
      <v-card-title>
        <span>ユーザー 一覧</span>
        <v-spacer></v-spacer>
        <v-btn router to="/main/user/create" height="35px" width="35px" fab>
          <v-icon color="primary">mdi-plus</v-icon>
        </v-btn>
      </v-card-title>
      <v-card-text class="pa-0">
        <v-simple-table>
          <thead>
            <tr>
              <th>ID</th>
              <th>名前</th>
              <th>メール</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(user, index) in users" :key="index" @click="$router.push(`/main/user/read?userId=${user.id}`)" v-ripple>
              <td>{{user.id}}</td>
              <td>
                <v-avatar size="30px" class="mr-1">
                  <v-img :src="user.img"></v-img>
                </v-avatar>
                <span>{{user.name}}</span>
              </td>
              <td>{{user.email}}</td>
            </tr>
          </tbody>
        </v-simple-table>
      </v-card-text>
    </v-card>
  </div>
</template>
<script>
import axios from "axios";
export default {
  data() {
    return {
      currentPage: 1,
      perPage: 10,
      keyword: "",
      users: [
        {
          id: 1,
          name: "ユーザー1（dummy）",
          email: "hogehoge@gmail.com",
          img: "https://picsum.photos/500/300?image=31",
        },
        {
          id: 2,
          name: "ユーザー2（dummy）",
          email: "hogehoge@gmail.com",
          img: "https://picsum.photos/500/300?image=32",
        },
        {
          id: 3,
          name: "ユーザー3（dummy）",
          email: "hogehoge@gmail.com",
          img: "https://picsum.photos/500/300?image=33",
        },
      ],
    };
  },
  methods: {
    getUsers() {
      const requestConfig = {
        url: "http://localhost:8001/api/users",
        method: "GET",
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