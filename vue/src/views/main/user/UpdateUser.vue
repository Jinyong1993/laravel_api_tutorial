<template>
  <div :class="{'is-sp':$vuetify.breakpoint.xs}">
    <v-card>
      <v-card-title>編集（{{user.name}} ID:{{user.id}}）</v-card-title>
      <v-card-text>
        <section class="user_info">
          <v-card-subtitle>ユーザー情報</v-card-subtitle>
          <ul>
            <li class="mb-5 mr-3">
              <v-avatar size="40px">
                <v-img :src="user.img"></v-img>
              </v-avatar>
            </li>
            <li>
              <v-text-field label="名前" v-model="user.name" prepend-inner-icon="mdi-account" dense outlined color="primary" class="mr-2"></v-text-field>
            </li>
            <li>
              <v-text-field label="メールアドレス" v-model="user.email" prepend-inner-icon="mdi-email" dense outlined color="primary" class="mr-2"></v-text-field>
            </li>
            <li>
              <v-text-field label="新しいパスワード" v-model="user.pass" prepend-inner-icon="mdi-lock" dense outlined color="primary" class="mr-2"></v-text-field>
            </li>
          </ul>
        </section>
      </v-card-text>
      <v-card-actions>
        <v-btn @click="deleltedUser()" color="error">
          <span>削除</span>
          <v-icon>mdi-delete</v-icon>
        </v-btn>
        <v-spacer></v-spacer>
        <v-btn @click="updateUser()" color="primary">
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
      user: {
        id: 1,
        name: "ユーザー1（dummy）",
        email: "hogehoge@gmail.com",
        img: "https://picsum.photos/500/300?image=31",
      },
    };
  },

  methods: {
    getUser() {
      const requestConfig = {
        url: "http://localhost:8001/api/user",
        method: "GET",
        params: {
          id: this.$route.query.userId,
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
    deleltedUser() {
      const requestConfig = {
        url: "http://localhost:8001/api/user",
        method: "DELETE",
        data: {
          id: this.$route.query.userId,
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
    updateUser() {
      const requestConfig = {
        url: "http://localhost:8001/api/user",
        method: "PUT",
        data: {
          id: this.$route.query.userId,
          name: this.user.name,
          email: this.user.email,
          pass: this.user.pass,
          img: this.user.img,
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
  mounted() {
    this.getUser();
  },
};
</script>

<style lang="scss" scoped>
.image_picker {
  ul {
    padding: 0 !important;
    display: flex;
    flex-wrap: wrap;
    li {
      list-style: none;
      width: 31%;
      margin-right: 3.5%;
      margin-bottom: 3.5%;
      &:nth-child(3n) {
        margin-right: 0;
      }
    }
  }
}
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