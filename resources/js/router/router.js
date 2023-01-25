import Vue from "vue";
import VueRouter from "vue-router";
import auth from "./auth";
import views from "./views";

Vue.use(VueRouter);

const routes = [
    ...auth,
    ...views

];
const router = new VueRouter({
    routes,
    mode: 'history'
});

export default router;

