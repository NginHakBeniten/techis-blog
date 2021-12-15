const menus = [
    {
        name: 'Dashboard',
        path: '/dashboard',
        icon: 'ni ni-shop'
    },
    {
        name: 'Form Components',
        path: '/form-components',
        icon: 'ni ni-shop'
    },
    {
        name: 'Form Element',
        path: '/form-elements',
        icon: 'ni ni-shop'
    },
    {
        name: 'Setting',
        icon: 'ni ni-settings',
        child: [
            {
                name: 'User Type',
                path: '/user-type',
            }
        ]
    },
]

export default menus;