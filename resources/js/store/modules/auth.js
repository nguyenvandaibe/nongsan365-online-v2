import authApi from '../../apis/authApi'

const state = {
    user: localStorage.getItem("app")
        ? JSON.parse(localStorage.getItem("app")).user
        : {},
    access_token: localStorage.getItem("access_token")
        ? JSON.parse(localStorage.getItem("access_token"))
        : "",
}

const actions = {
    login({commit}, payload) {
        return new Promise((resolve, reject) => {
            authApi.login(payload)
                .then((response) => {

                    let user = response.data.data.user;
                    let access_token = response.data.data.access_token;
                    commit('SET_AUTH_DATA', {
                        user: user,
                        access_token: access_token
                    });

                    let appString = localStorage.getItem('app');
                    let app = null;

                    if (appString !== null) {
                        app = JSON.parse(appString);
                    } else {
                        app = new Object();
                    }

                    app["user"] = user;

                    localStorage.setItem("app", JSON.stringify(app));
                    localStorage.setItem("access_token", JSON.stringify(access_token));
                    resolve(response);
                })
                .catch((error) => reject(error));
        })
    },

    logout({commit}, payload) {
        return new Promise((resolve, reject) => {
            authApi.logout(payload.access_token)
                .then((response) => {
                    commit('SET_AUTH_DATA', {user: {}, access_token: ""})
                    let app = JSON.parse(localStorage.getItem("app"))
                    app.user = new Object();
                    localStorage.setItem("app", JSON.stringify(app));
                    localStorage.setItem("access_token", "");
                    resolve(response)
                })
                .catch((error) => reject(error))
        })
    },

    verifyUser({commit}, payload) {
        return new Promise((resolve, reject) => {
            authApi.verifyUser(payload)
                .then((response) => {
                    resolve(response);
                })
                .catch((error) => {
                    commit('SET_AUTH_DATA', {user: {}, access_token: ""})
                    reject(error);
                });
        })
    }
}

const mutations = {
    SET_AUTH_DATA(state, data) {
        state.user = data.user;
        state.access_token = data.access_token;
    }
}

const getters = {
    isLoggedIn: (state) => {
        return state.access_token !== ""
    },
}

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}
