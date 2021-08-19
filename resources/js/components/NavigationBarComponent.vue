<template>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container-fluid">
            <router-link class="navbar-brand" :to="{ name: 'Home' }"
                         style="font-family: 'Paytone One', sans-serif; color: #149414;">
                NÔNG SẢN 365
            </router-link>

            <button
                class="navbar-toggler border-0"
                type="button"
                data-toggle="collapse"
                data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <router-link class="nav-link" :to="{ name: 'Home' }">
                            Trang chủ
                        </router-link>
                    </li>
                    <li class="nav-item" :to="{ name: 'Home' }">
                        <router-link class="nav-link" :to="{ name: 'Home' }">
                            Bán nông sản
                        </router-link>
                    </li>
                    <li class="nav-item" v-if="isLoggedIn === false">
                        <router-link class="nav-link" :to="{ name: 'Login' }">
                            Đăng nhập
                        </router-link>
                    </li>
                    <li class="nav-item" v-if="isLoggedIn === false">
                        <router-link
                            class="nav-link"
                            :to="{ name: 'Register' }"
                        >
                            Đăng ký
                        </router-link>
                    </li>
                    <li class="nav-item dropdown" v-if="isLoggedIn === true">
                        <router-link
                            class="nav-link"
                            :to="{
                                name: 'MyProfile',
                            }"
                        >
                            {{ user.name }}
                        </router-link>
                    </li>

                    <li class="nav-item dropdown" v-if="isLoggedIn === true">
                        <a
                            id="navbarDropdown2"
                            class="nav-link dropdown-toggle"
                            href="#"
                            role="button"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                        >
                            <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div
                            class="dropdown-menu dropdown-menu-right"
                            aria-labelledby="navbarDropdown2"
                        >
                            <router-link
                                class="dropdown-item"
                                :to="{
                                    name: 'UserDashboard',
                                    params: { username: user.username },
                                }"
                            >
                                <i class="far fa-user-circle"></i>
                                {{ "Kênh người bán" }}
                            </router-link>
                            <div class="dropdown-divider"></div>
                            <a
                                class="dropdown-item"
                                href="javascript:void(0)"
                                @click="logout"
                            >
                                <i class="fas fa-power-off"></i>
                                {{ "Đăng xuất" }}
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script>
import {mapGetters, mapState} from "vuex";

export default {
    data() {
        return {
            logo: "/storage/static/logo/logo-2.png",
        };
    },

    mounted() {
    },

    methods: {
        logout() {
            this.$store
                .dispatch("moduleAuth/logout", {
                    accessToken: this.accessToken,
                })
                .then((response) => {
                    if (this.$route.name !== "Home")
                        this.$router.push({name: "Home"});
                })
                .catch((error) => {
                    console.log(error);
                });
        },
    },

    computed: {
        ...mapState("moduleAuth", ["user", "accessToken"]),
        ...mapGetters("moduleAuth", ["isLoggedIn"]),
    },
};
</script>

<style scoped>
#logo {
    height: 4rem;
}

.nav-link {
    width: max-content;
}

.router-link-exact-active,
.dropdown-item:hover {
    color: #149414 !important;
}

i {
    width: 20px;
}

.dropdown-toggle::after {
    display: none;
}

li:has("a.router-link-exact-active") {
    border-bottom: green solid !important;
}
</style>
