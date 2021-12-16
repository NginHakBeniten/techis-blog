import TagRequest from "../../../requests/tag_request";


export default {
    getTags({commit}) {
        TagRequest.index().then(res => {
            commit('SET_TAGS', res.data)
        })
    },
}