import Vue from 'vue';
import VueRouter from "vue-router";

import WebLayout from "./layout/Web";
import AdminLayout from "./layout/Admin";
import UserLayout from "./layout/User";

import Home from './views/Home';
import Login from "./views/auth/Login";
import Register from "./views/auth/Register";

import AdminDashboard from "./views/admin/Dashboard";

import MyProfile from './views/user/Profile';
import MyOrders from './views/user/Orders';

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

        {
            path: "/u",
            component: UserLayout,
            meta: {
                requiresAuth: true,
            },
            children: [
                {
                    path: "",
                    name: "MyProfile",
                    component: MyProfile
                },
                {
                    path: "don-hang",
                    name: "MyOrders",
                    component: MyOrders
                }
            ]
        },

        {
            path: "/admin",
            component: AdminLayout,
            meta: {
                requiresAuth: true,
            },
            children: [
                {
                    path: "bang-dieu-khien",
                    name: "AdminDashboard",
                    component: AdminDashboard
                }
            ]
        }
    ]
});

export default router;
