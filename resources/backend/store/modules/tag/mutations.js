export default {
    SET_TAGS(state, res) {
        state.tags = {
            ...state.tags,
            ...res
        }
    }
}