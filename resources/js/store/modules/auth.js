import authApi from '../../apis/authApi'

const state = {
    user: localStorage.getItem("myApp.user")
        ? JSON.parse(localStorage.getItem("myApp.user"))
        : {},
    accessToken: localStorage.getItem("myApp.accessToken")
        ? JSON.parse(localStorage.getItem("myApp.accessToken"))
        : "",
}

const actions = {
    login({ commit }, payload) {
        return new Promise((resolve, reject) => {
            authApi.login(payload)
                .then((response) => {
                    commit('SET_AUTH_DATA', { user: response.data.data.user, accessToken: response.data.data.accessToken });
                    localStorage.setItem("myApp.user", JSON.stringify(response.data.data.user));
                    localStorage.setItem("myApp.accessToken", JSON.stringify(response.data.data.accessToken));
                    resolve(response);
                })
                .catch((error) => reject(error));
        })
    },

    logout({ commit }, payload) {
        return new Promise((resolve, reject) => {
            authApi.logout(payload.accessToken)
                .then((response) => {
                    commit('SET_AUTH_DATA', { user: {}, accessToken: "" })
                    localStorage.removeItem("myApp.user");
                    localStorage.removeItem("myApp.accessToken");
                    resolve(response)
                })
                .catch((error) => reject(error))
        })
    },

    verifyUser({ commit }, payload) {
        return new Promise((resolve, reject) => {
            authApi.verifyUser(payload)
                .then((response) => {
                    resolve(response);
                })
                .catch((error) => {
                    commit('SET_AUTH_DATA', { user: {}, accessToken: "" })
                    reject(error);
                });
        })
    }
}

const mutations = {
    SET_AUTH_DATA(state, data) {
        console.log(data.accessToken);
        state.user = data.user;
        state.accessToken = data.accessToken;
    }
}

const getters = {
    isLoggedIn: (state) => {
        return state.accessToken !== ""
    },
}

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}
