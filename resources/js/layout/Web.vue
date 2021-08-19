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
    },

    methods: {
        updateLayout() {
            this.$nextTick(() => {
                let headerBox = document.querySelector('header');
                let mainBox = document.querySelector('main');

                let mainBoxHeight = window.innerHeight - headerBox.clientHeight;
                mainBox.style.minHeight = mainBoxHeight + 'px';
            })
        }
    },

    updated() {
        this.updateLayout()
    }
}
</script>

<style scoped>

</style>
