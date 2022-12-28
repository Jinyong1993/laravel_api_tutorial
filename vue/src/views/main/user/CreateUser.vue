<template>
  <div :class="{'is-sp':$vuetify.breakpoint.xs}">
    <v-card>
      <v-card-title>新しいユーザーを登録</v-card-title>
      <v-card-text>
        <section class="user_info">
          <v-card-subtitle>ユーザー情報</v-card-subtitle>
          <ul>
            <li class="mb-5 mr-3">
              <v-avatar size="40px">
                <v-img :src="newUserImage"></v-img>
              </v-avatar>
            </li>
            <li>
              <v-text-field label="名前" :value="newUserName" @input="onCreateName" prepend-inner-icon="mdi-account" dense outlined color="primary" class="mr-2"></v-text-field>
            </li>
            <li>
              <v-text-field label="メールアドレス" :value="newUserEmail" @input="onCreateEmail" prepend-inner-icon="mdi-email" dense outlined color="primary" class="mr-2"></v-text-field>
            </li>
            <li>
              <v-text-field label="パスワード" :value="newUserPass" @input="onCreatePass" prepend-inner-icon="mdi-lock" dense outlined color="primary" class="mr-2"></v-text-field>
            </li>
          </ul>
        </section>
      </v-card-text>
      <v-card-actions>
        <v-spacer></v-spacer>
        <v-btn color="primary" @click="postUser()">
          <span>登録</span>
          <v-icon>mdi-send</v-icon>
        </v-btn>
      </v-card-actions>
    </v-card>

  </div>
</template>
<script>
import axios from "axios";
export default {
  data() {
    return {
      newUserImage: "https://picsum.photos/500/300?image=1",
      newUserName: "",
      newUserEmail: "",
      newUserPass: "",
    };
  },
  methods: {
    onCreateName(userName) {
      this.newUserName = userName;
    },
    onCreateEmail(userEmail) {
      this.newUserEmail = userEmail;
    },
    onCreatePass(userPass) {
      this.newUserPass = userPass;
    },
    postUser() {
      const requestConfig = {
        url: "http://localhost:8001/api/user",
        method: "POST",
        data: {
          name: this.newUserName,
          email: this.newUserEmail,
          password: this.newUserPass,
          img: this.newUserImage,
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

<style lang="scss" scoped>
.user_info {
  ul {
    display: flex;
    li {
      margin-right: 20px;
      &:last-child {
        margin-right: 0;
      }
    }
  }
}
.is-sp {
  .user_info {
    ul {
      display: block;
      li {
        justify-content: center;
      }
    }
  }
}
</style>