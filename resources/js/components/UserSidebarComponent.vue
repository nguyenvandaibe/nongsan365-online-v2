<template>
    <nav class="nav flex-column">
        <router-link class="nav-link text-dark" :to="{name: 'MyProfile'}">
            <span>
                <i class="far fa-user-circle"></i>
            </span>
            {{ "Trang cá nhân" }}
        </router-link>
        <router-link class="nav-link text-dark" :to="{name: 'MyOrders'}">
            <span>
                <i class="far fa-file-invoice-dollar"></i>
            </span>
            {{ "Đơn hàng" }}
        </router-link>
    </nav>
</template>

<script>
import { mapState } from 'vuex';
export default {
    computed: {
        ...mapState("moduleAuth", ["user"])
    }
};
</script>

<style scoped>
.router-link-exact-active.router-link-active {
    background-color: lightgray;
}


.nav-link:hover {
    background-color: #ebecf0;
}

i {
    width: 20px;
}
</style>