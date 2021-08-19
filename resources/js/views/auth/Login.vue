<template>
    <div class="container-fluid">
        <div class="d-flex justify-content-center row mx-0">
            <form
                action="javascript:void(0)"
                @submit.prevent="login"
                class="col-md-4 py-3 px-4 shadow bg-white rounded-lg"
            >
                <div
                    class="text-center text-uppercase my-4"
                    style="
                        font-family: 'Paytone One', sans-serif;
                        color: #149414;
                        font-size: x-large;
                    "
                >
                    {{ appName }}
                </div>

                <div class="form-group">
                    <label> {{ "Email" }} </label>
                    <input
                        type="text"
                        class="form-control"
                        :class="{
                            'is-invalid':
                                errors.email !== undefined
                        }"
                        autofocus
                        placeholder="Email"
                        v-model="formData.email"
                    />
                    <span
                        v-if="errors.email !== undefined"
                        class="invalid-feedback"
                        role="alert"
                    >
                        <strong>{{ errors.email[0] }}</strong>
                    </span>
                </div>

                <div class="form-group">
                    <label> {{ "Mật khẩu" }} </label>

                    <input
                        type="password"
                        class="form-control"
                        :class="{
                            'is-invalid':
                                errors.password !== undefined
                        }"
                        placeholder="Mật khẩu"
                        v-model="formData.password"
                    />
                    <span
                        v-if="errors.password !== undefined"
                        class="invalid-feedback"
                        role="alert"
                    >
                        <strong>{{ errors.password[0] }}</strong>
                    </span>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn c-bg-primary text-white mr-3">
                        <span v-if="!loading">{{ "Đăng nhập" }}</span>
                        <span v-else>{{ "Đang đăng nhập..." }}</span>
                    </button>

                    <span>
                        <a href="javascript:void(0)"
                            >{{ "Quên mật khẩu ?" }}
                        </a>
                    </span>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    name: "Login",

    data() {
        return {
            appName: "",
            loading: false,
            errors: [],
            formData: {
                email: "",
                password: "",
            },
        };
    },

    mounted() {
        document.title = "Đăng nhập";

        this.appName = process.env.MIX_APP_NAME;
    },

    methods: {
        login() {
            this.loading = true;
            this.$store
                .dispatch("moduleAuth/login", this.formData)
                .then((response) => {
                    this.errors = []; // Xóa lỗi cũ đi

                    let user = response.data.data.user;

                    if (user.role === 0) {
                        this.$router.push({
                            name: "AdminDashboard",
                        });
                    } else {
                        this.$router.push({
                            name: "Home",
                        });
                    }
                })
                .catch((error) => {
                    console.log(error);
                    this.errors = error.response.data.errors;
                })
                .finally(() => {
                    this.loading = false;
                });

        },
    },
};
</script>

<style scoped>
form {
    margin-top: 10vh;
    position: relative;
}
</style>
