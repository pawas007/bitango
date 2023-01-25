<template>
    <div>
        <v-toolbar app dark color="blue-grey darken-1" class="hidden-xs-and-down">
            <v-toolbar-title class="mr-10">Bitango</v-toolbar-title>
            <v-toolbar-items>
                <nav>
                    <ul class="navigation py-0 d-flex align-center">
                        <li class="nav_link_item mr-3">
                            <router-link :to="{name:'Home'}">Home</router-link>
                        </li>
                        <li class="nav_link_item mr-3">
                            <router-link :to="{name:'Users'}">Users</router-link>
                        </li>
                    </ul>
                </nav>
            </v-toolbar-items>
            <v-spacer></v-spacer>
            <v-btn
                elevation="1"
                icon
                :to="{name:'Sign Up'}">
                <v-icon>supervised_user_circle</v-icon>
            </v-btn>
        </v-toolbar>
    </div>
</template>
<script>
export default {
    name: "HeaderMain",
}
</script>
<style scoped lang="scss">
.navigation {
    height: 100%;
    list-style: none;

    .nav_link_item {
        a {
            color: #e2e8f0;
            text-decoration: none;

            &.router-link-exact-active {
                opacity: 0.6;
            }
        }
    }
}
</style>
