import DashboardLayout from '@/views/layout/DashboardLayout.vue';
import AuthLayout from '@views/auth/AuthLayout.vue';

import LoginMiddleware from '../middlewares/login';

const Login = () => import('@/views/auth/Login.vue');
const NotFound = () => import('@views/errors/404');

//
const FormComponents = () => import('@/views/forms/FormComponents.vue');
const FormElements = () => import('@/views/forms/FormElements.vue');
//
const requireRoute = require.context('.', false, /\.js$/);

let authPages = {
    path: '/',
    component: AuthLayout,
    children: [
      {
        path: '/login',
        name: 'login',
        component: Login,
        meta: {
          middleware: LoginMiddleware
        }
      },
      { path: '*', component: NotFound }
    ]
};
  

const routes = [
    {
        path: "/",
        redirect: '/dashboard',
        component: DashboardLayout,
        name: 'Dashboard layout',
        children: [
            {
                path: 'form-components',
                name: 'form-components',
                component: FormComponents
            },
            {
                path: 'form-elements',
                name: 'form-elements',
                component: FormElements
            },
        ]
    },
    authPages,
];

requireRoute.keys().forEach((fileName) => {
	if (fileName === './index.js') {
		return;
	}
	const route = requireRoute(fileName).default;
	routes[0].children.push(...route);
});

export default routes;
