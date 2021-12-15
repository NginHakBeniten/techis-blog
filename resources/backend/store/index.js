import actions from "./actions";
import mutations from "./mutations";
import getters from "./getters";
import modules from "./modules";
import { createStore } from "vuex";

// Create a new store instance.
const store = createStore({
    state() {
        return {
            sidebarVisible: "",
            sidebarUnfoldable: false,
        };
    },
    mutations,
    actions,
    getters,
    modules,
});

export default store;
