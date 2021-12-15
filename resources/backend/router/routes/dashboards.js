export default [
    {
        path: "dashboard",
        name: "dashboard",
        components: {
          default: () => import("@views/dashboard/Index")
        }
    },
]