<template>
    <div class="container-fluid">
        <h1>{{ "Thông tin tài khoản" }}</h1>
        <div class="row">
            <div class="col-md-4">
                <img
                    :src="user.avatar"
                    alt=""
                    srcset=""
                    style="max-width: 100%"
                />
            </div>
            <div class="col-md-8">
                <div class="card border-0">
                    <div class="card-body">
                        <h4>{{ "Thông tin cá nhân" }}</h4>
                        <form>
                            <div class="form-group row">
                                <label
                                    for="name"
                                    class="col-form-lable col-sm-3"
                                >
                                    {{ "Họ và tên" }}
                                </label>
                                <div class="col-sm-9">
                                    <input
                                        type="text"
                                        id="name"
                                        class="form-control form-control-sm"
                                        disabled
                                        v-model="userData.name"
                                    />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label
                                    for="email"
                                    class="col-form-lable col-sm-3"
                                >
                                    {{ "Email" }}
                                </label>
                                <div class="col-sm-9">
                                    <input
                                        type="email"
                                        id="email"
                                        class="form-control form-control-sm"
                                        v-model="userData.email"
                                        disabled
                                    />
                                </div>
                            </div>
                            <div class="form-group">
                                <button
                                    type="button"
                                    class="btn btn-sm btn-outline-secondary"
                                    v-if="!isUserDataUpdating"
                                    @click="isUserDataUpdating = true"
                                >
                                    <i class="fal fa-edit"></i>
                                    {{ "Sửa" }}
                                </button>
                                <button
                                    type="submit"
                                    class="btn btn-sm border text-white"
                                    style="background-color: orange"
                                    v-if="isUserDataUpdating"
                                >
                                    <i class="far fa-save"></i>
                                    {{ "Lưu" }}
                                </button>
                                <button
                                    type="reset"
                                    class="btn btn-sm bg-secondary text-white"
                                    v-if="isUserDataUpdating"
                                    @click="isUserDataUpdating = false"
                                >
                                    <i class="fal fa-times-circle"></i>
                                    {{ "Hủy" }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapState } from "vuex";
export default {
    name: "Profile",

    data() {
        return {
            userData: {},
            isUserDataUpdating: false,
        };
    },

    computed: {
        ...mapState("moduleAuth", ["user"]),
    },

    mounted() {
        this.userData = this.user;

        document.title = "Trang cá nhân";
    },
};
</script>

<style scoped>
</style>
