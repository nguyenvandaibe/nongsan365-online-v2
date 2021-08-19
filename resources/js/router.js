import Vue from 'vue';
import VueRouter from "vue-router";

import WebLayout from "./layout/Web";

import Home from './views/Home';
import Login from "./views/auth/Login";
import Register from "./views/auth/Register";

Vue.use(VueRouter);

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            component: WebLayout,
            children: [
                {
                    path: "",
                    name: "Home",
                    component: Home
                },
                {
                    path: "dang-nhap",
                    name: "Login",
                    component: Login
                },
                {
                    path: "dang-ky",
                    name: "Register",
                    component: Register
                },
            ]
        },
    ]
});

export default router;
