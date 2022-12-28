import Vue from 'vue'
import Vuex from 'vuex'
import router from "../router/index";

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        loginInfo: null,
    },
    mutations: {
        setLoginInfo(state, loginInfo) {
            state.loginInfo = loginInfo
        },
    },
    actions: {
        logout({ commit }) {
            localStorage.removeItem("token");
            commit("setLoginInfo", null)
            router.push("/login/signin")
        }
    },
    modules: {
    }
})
