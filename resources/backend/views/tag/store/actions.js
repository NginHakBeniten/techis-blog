import TagRequest from "@requests/tag_request";

export const getTags = ({commit}) {
    TagRequest.index().then(res => {
        commit('setTags', res)
    })
}

// export default {

//     getProperties({commit}, filter = {}) {
//         TagRequest.index(filter).then(res => {
//             commit('SET_PROPERTIES', res)
//         })
//     },

//     createProperty({}, data) {
//         return TagRequest.store(data)
//     },

//     showProperty({}, {id, data}) {
//         return TagRequest.show(id, data)
//     },

//     updateProperty({}, {id, data}) {

//     }
// }