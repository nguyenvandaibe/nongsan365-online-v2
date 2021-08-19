<template>
    <div>
        <header class="sticky-top">
            <NavigationBarComponent />
        </header>

        <main class="container-fluid pt-3 justify-content-center">
            <div class="row">
                <UserSidebarComponent class="col-sm-2" />
                <router-view class="col-sm-10" />
            </div>
        </main>
    </div>
</template>

<script>
import NavigationBarComponent from "../components/NavigationBarComponent.vue";
import UserSidebarComponent from "../components/UserSidebarComponent";

export default {
    name: "User",

    components: {
        NavigationBarComponent,
        UserSidebarComponent
    }
}
</script>

<style scoped>

</style>
