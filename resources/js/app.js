import Vue from 'vue';
import router from './router/router';
import App from './App.vue';
import Vuetify from 'vuetify'

import 'vuetify/dist/vuetify.min.css'
import 'material-design-icons-iconfont/dist/material-design-icons.css'
import "@mdi/font/css/materialdesignicons.css";

Vue.use(Vuetify)

new Vue({
    router,
    vuetify : new Vuetify(),
    render: (h) => h(App),
}).$mount('#app');
