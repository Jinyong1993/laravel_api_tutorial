<template>
  <div>
    <v-navigation-drawer width="200px" app permanent>
      <v-list-item>
        <v-list-item-avatar>
          <v-img src="https://picsum.photos/500/300?image=30"></v-img>
        </v-list-item-avatar>
        <v-list-item-content>
          <v-list-item-title class="px-1 pt-2">テスト</v-list-item-title>
          <v-btn max-width="75px" class="pa-0" color="primary" small text @click="logout()">ログアウト</v-btn>
        </v-list-item-content>
      </v-list-item>
      <v-list nav dense>
        <v-list-item style="border-bottom:none;" v-for="nav in navs" :key="nav.ttl" :to="nav.to" router exact-path>
          <v-list-item-icon>
            <v-badge :value="false" :content="0" color="primary" offset-x="5" offset-y="15">
              <v-icon>{{nav.icon}}</v-icon>
            </v-badge>
          </v-list-item-icon>
          <v-list-item-content>
            <v-list-item-title>{{ nav.ttl }}</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
      </v-list>
    </v-navigation-drawer>
    <v-main>
      <v-container>
        <router-view />
      </v-container>
    </v-main>
  </div>

</template>

<script>
export default {
  data() {
    return {
      navs: [
        {
          to: "/main/task",
          icon: "mdi-playlist-check",
          ttl: "タスク",
        },
        {
          to: "/main/user",
          icon: "mdi-account-group",
          ttl: "ユーザー",
        },
      ],
    };
  },
  methods: {
    logout() {
        alert("ログアウト");
    },
  },
};
</script>
<style lang="scss" scoped>
.header {
  ::v-deep {
    .v-toolbar__content {
      padding: 0 !important;
    }
  }
}
</style>
