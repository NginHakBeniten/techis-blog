const GET_CURRENT_USER = (state, payload) => {
    state.currentUser = payload.user;
};
export default { GET_CURRENT_USER };
