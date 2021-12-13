const getCurrentUser = ({ commit }, payload) => {
    commit("GET_CURRENT_USER", payload);
};
export default { getCurrentUser };
