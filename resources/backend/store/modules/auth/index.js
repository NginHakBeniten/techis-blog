import actions from "./actions";
import mutations from "./mutations";
import getters from "./getters";

export default {
    // namespaced: true,
    state: () => ({
        authUser: {},
        errors: {
            username: null,
            password: null,
        },
    }),
    actions,
    getters,
    mutations,
};
