import AuthRequest from '@requests/auth_request';

const login = async ({ commit }, loginBody) => {
    await AuthRequest.login(loginBody).then((user) => {
        commit("STORE_COOKIES_AUTH_USER", user);
    });
};
export default { login };
