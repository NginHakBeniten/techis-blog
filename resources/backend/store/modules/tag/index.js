import mutations from './mutations';
import actions from './actions';
import getters from './getters';

export default {
    namespaced: true,
    state: () => ({
        data: [],
        meta: {
            
        }
    }),
    mutations,
    actions,
    getters
}