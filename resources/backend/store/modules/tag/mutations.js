export default {
    SET_TAGS(state, res) {
        state.data = res.data
        state.meta = res.meta
    }
}