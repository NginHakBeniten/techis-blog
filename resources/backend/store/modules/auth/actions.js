import AuthRequest from "@requests/auth_request";

const login = async ({ commit }, loginBody) => {
    await AuthRequest.login(loginBody).then((res) => {
        commit("STORE_COOKIES_AUTH_USER", res.data);
    });
};
export default { login };
