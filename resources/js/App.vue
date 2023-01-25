<template>
    <div>
        <v-app>
        <header-main/>
        <v-main>
            <router-view></router-view>
        </v-main>
    </v-app>
    </div>
</template>

<script>
import HeaderMain from "./components/HeaderMain";

export default {
    name: "App",
    components: {HeaderMain}
}
</script>

<style scoped>

</style>
