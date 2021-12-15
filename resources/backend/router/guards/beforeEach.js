import Constants from '@constants';
import Cookies from 'js-cookie';

export default (to, from, next) => {
    const isAuthenticated = Cookies.get(Constants.ACCESS_TOKEN)
	if (!isAuthenticated && to.name !== 'login') {
		next({ name: 'login' });
	} else if ((isAuthenticated && to.name === 'login') || to.path === '/') {
        console.log("In dashboard");
		next({ name: 'dashboard' });
	} else {
		next();
	}
}
