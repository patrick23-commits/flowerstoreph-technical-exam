import { createRouter, createWebHistory } from "vue-router";

import Login from "../pages/Login.vue";
import NotFound from "../pages/NotFound.vue"
import Home from "../pages/Home.vue";

const routes = [
    // {
    //     path : "/login",
    //     name : "Login",
    //     component : Login,
    // },
    {
        path : '/home',
        name : 'Home',
        component : Home
    },
    { 
        path: '/:pathMatch(.*)*', 
        name: 'NotFound', 
        component: NotFound 
    }
]

const router = createRouter(
    {
        "history" : createWebHistory(),
        "routes" : routes
    }
)

export default router;