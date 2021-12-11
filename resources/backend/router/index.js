import { h, resolveComponent } from "vue";
import { createRouter, createWebHashHistory } from "vue-router";

import DefaultLayout from "@/layouts/DefaultLayout";

const routes = [
    {
        path: "/admin",
        name: "Admin",
        component: DefaultLayout,
        children: [
            {
                path: "dashboard",
                name: "Dashboard",
                component: () => import("@/views/Dashboard.vue"),
            },
            {
                path: "user",
                name: "User Management",
                component: {
                    render() {
                        return h(resolveComponent("router-view"));
                    },
                },
                children: [
                    {
                        path: "",
                        component: () => import("@/views/user/Index.vue"),
                    },
                    {
                        path: "create",
                        name: "Create User",
                        component: () => import("@/views/user/User.vue"),
                    },
                    {
                        path: "update/:id",
                        name: "update",
                        component: () => import("@/views/user/User.vue"),
                    },
                ],
            },
            {
                path: "article",
                name: "Article Management",
                component: {
                    render() {
                        return h(resolveComponent("router-view"));
                    },
                },
                children: [
                    {
                        path: "",
                        component: () => import("@/views/article/Index.vue"),
                    },
                    {
                        path: "create",
                        name: "Create User",
                        component: () => import("@/views/article/Article.vue"),
                    },
                    {
                        path: "update/:id",
                        name: "update",
                        component: () => import("@/views/article/Article.vue"),
                    },
                ],
            },
            {
                path: "tag",
                name: "Tag Management",
                component: () => import("@/views/Dashboard.vue"),
            },
            {
                path: "log",
                name: "Activity Log",
                component: () => import("@/views/Dashboard.vue"),
            },
        ],
    },
];

const router = createRouter({
    history: createWebHashHistory(),
    routes,
    scrollBehavior() {
        // always scroll to top
        return { top: 0 };
    },
});

export default router;
