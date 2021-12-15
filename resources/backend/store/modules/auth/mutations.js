import Cookies from 'js-cookie';

import Constants from '@constants';

const STORE_COOKIES_AUTH_USER = (state, payload) => {
    state.authUser = payload.data;
    Cookies.set(Constants.ACCESS_TOKEN, payload.data.token);
};

export default { STORE_COOKIES_AUTH_USER };
