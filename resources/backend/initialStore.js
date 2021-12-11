import { createStore } from "vuex";
import storeModule from "./store"
import userModule from "./views/user/store"

const store = createStore({
    modules: {
        store: storeModule,
        users: userModule,
    },
});

export default store;
