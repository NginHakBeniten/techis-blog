import mutations from './mutations';
import actions from './actions';
import getters from './getters';

export default {
    namespaced: true,
    state: () => ({
        data: [],
        meta: {
            total: 0,
            per_page: 15,
            total_page: 1,
            current_page: 1,
            next_page: null,
            prev_page: null,
        },
    }),
    mutations,
    actions,
    getters
}
