<template>
    <div>
        Home
    </div>
</template>

<script>
export default {
    name: "Home",

    mounted() {

        document.title = process.env.MIX_APP_NAME;
    }
}
</script>

<style scoped>

</style>
