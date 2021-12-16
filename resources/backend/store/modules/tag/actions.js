import TagRequest from "../../../requests/tag_request";


export default {
    getTags({commit}) {
        TagRequest.index().then(res => {
            commit('SET_TAGS', res.data)
        })
    },
    store({commit}, data) {
        TagRequest.store(data).then(res => {
            console.log(res);
        })
    }
}