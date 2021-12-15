import actions from "./actions";
import mutations from "./mutations";
import getters from "./getters";
import modules from './modules';

const state = {
    sidebarVisible: "",
    sidebarUnfoldable: false,
};

export default {
    state,
    actions,
    getters,
    mutations,
    modules
};
