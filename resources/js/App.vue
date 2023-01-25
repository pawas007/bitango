<template>
    <v-app>
        <header-main/>
        <v-main app>
            <v-container>
                <router-view></router-view>
            </v-container>
        </v-main>
    </v-app>
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
