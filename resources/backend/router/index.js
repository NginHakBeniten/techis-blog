import { h, resolveComponent } from "vue";
import { createRouter, createWebHistory } from "vue-router";

import DefaultLayout from "@/layouts/DefaultLayout";
import guard from "./guards";

const routes = [
    {
        path: "/admin/login",
        name: "login",
        meta: {
            breadcrumb: "Login",
        },
        component: () => import("@/views/pages/Login.vue"),
    },
    {
        path: "/admin",
        name: "admin",
        meta: {
            breadcrumb: "Admin",
        },
        component: DefaultLayout,
        children: [
            {
                path: "dashboard",
                name: "dashboard",
                meta: {
                    breadcrumb: "Dashboard",
                },
                component: () => import("@/views/Dashboard.vue"),
            },
            {
                path: "user",
                name: "user",
                meta: {
                    breadcrumb: "User Management",
                },
                component: {
                    render() {
                        return h(resolveComponent("router-view"));
                    },
                },
                children: [
                    {
                        path: "",
                        component: () =>
                            import("@/views/user/components/Index.vue"),
                    },
                    {
                        path: "create",
                        name: "create-user",
                        meta: {
                            breadcrumb: "Create User",
                        },
                        component: () =>
                            import("@/views/user/components/User.vue"),
                    },
                    {
                        path: "update/:id",
                        name: "update-user",
                        meta: {
                            breadcrumb: "Update User",
                        },
                        component: () =>
                            import("@/views/user/components/User.vue"),
                    },
                ],
            },
            {
                path: "article",
                name: "article",
                meta: {
                    breadcrumb: "Article Management",
                },
                component: {
                    render() {
                        return h(resolveComponent("router-view"));
                    },
                },
                children: [
                    {
                        path: "",
                        component: () =>
                            import("@/views/article/components/Index.vue"),
                    },
                    {
                        path: "create",
                        name: "create-article",
                        meta: {
                            breadcrumb: "Create Article",
                        },
                        component: () =>
                            import("@/views/article/components/Article.vue"),
                    },
                    {
                        path: "update/:id",
                        name: "update-article",
                        meta: {
                            breadcrumb: "Update Article",
                        },
                        component: () =>
                            import("@/views/article/components/Article.vue"),
                    },
                ],
            },
            {
                path: "tag",
                name: "tag",
                meta: {
                    breadcrumb: "Tag Management",
                },
                component: {
                    render() {
                        return h(resolveComponent("router-view"));
                    },
                },
                children: [
                    {
                        path: "",
                        component: () =>
                            import("@/views/tag/components/Index.vue"),
                    },
                    {
                        path: "create",
                        name: "create-tag",
                        meta: {
                            breadcrumb: "Create Tag",
                        },
                        component: () =>
                            import("@/views/tag/components/Tag.vue"),
                    },
                    {
                        path: "update/:id",
                        name: "update-tag",
                        meta: {
                            breadcrumb: "Update Tag",
                        },
                        component: () =>
                            import("@/views/tag/components/Tag.vue"),
                    },
                ],
            },
            {
                path: "log",
                name: "activity-log",
                meta: {
                    breadcrumb: "Activity Log",
                },
                component: () => import("@/views/Dashboard.vue"),
            },
        ],
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
    mode: "history",
    linkActiveClass: "active",
    scrollBehavior: (to, from, savedPosition) => {
        if (savedPosition) {
          return savedPosition;
        }
        if (to.hash) {
          return { selector: to.hash };
        }
        return { x: 0, y: 0 };
      },
});

router.beforeEach(guard.beforeEach);

export default router;
