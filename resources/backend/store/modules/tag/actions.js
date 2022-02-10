import TagRequest from "../../../requests/tag_request";


export default {
    getTags({commit}) {
        TagRequest.index().then(res => {
            commit('SET_TAGS', res.data)
        })
    },
    showTag({commit}, id) {
        return TagRequest.show(id).then(res => res.data)
    },
    store({commit}, data) {
        TagRequest.store(data)
    },
    update({commit}, data) {
        TagRequest.update(+data.id, data)
    }
}