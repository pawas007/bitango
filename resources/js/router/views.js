import Home from "../views/Home.vue";
import Users from "../views/Users";

export default
[
    {
        path: "/",
        name: "Home",
        component: Home,
    },
    {
        path: "/users",
        name: "Users",
        component: Users,
    },
]
