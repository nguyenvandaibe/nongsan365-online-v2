<template>
    <div>
        <header class="sticky-top">
            <NavigationBarComponent />
        </header>

        <main class="container-fluid">
            <router-view />
        </main>
    </div>
</template>

<script>
import NavigationBarComponent from "../components/NavigationBarComponent.vue";

export default {
    name: "Web",

    components: {
        NavigationBarComponent
    }
}
</script>

<style scoped>

</style>
