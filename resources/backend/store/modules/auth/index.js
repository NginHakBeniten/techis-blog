import actions from "./actions";
import mutations from "./mutations";
import getters from "./getters";

const state = {
    authUser: {},
    errors: {
        username: null,
        password: null
    }
};

export default {
    state,
    actions,
    getters,
    mutations,
};
