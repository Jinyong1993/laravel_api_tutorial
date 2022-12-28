<template>
  <div :class="{'is-sp':$vuetify.breakpoint.xs}">
    <v-card>
      <v-card-title>詳細（{{user.name}} ID:{{user.id}}）</v-card-title>
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
              <v-text-field label="名前" :value="user.name" prepend-inner-icon="mdi-account" dense readonly outlined color="primary" class="mr-2"></v-text-field>
            </li>
            <li>
              <v-text-field label="メールアドレス" :value="user.email" prepend-inner-icon="mdi-email" dense readonly outlined color="primary" class="mr-2"></v-text-field>
            </li>
          </ul>
        </section>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn @click="$router.push(`/main/user/update?userId=${user.id}`)" color="orange" class="orange white--text">
            <span>編集</span>
            <v-icon>mdi-pencil</v-icon>
          </v-btn>
        </v-card-actions>
      </v-card-text>
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
  },
};
</script>

<style lang="scss" scoped>
.user_info {
  ul {
    display: flex;
    li {
      display: flex;
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
.v-card__subtitle {
  padding: 5px 10px 16px;
}
</style>