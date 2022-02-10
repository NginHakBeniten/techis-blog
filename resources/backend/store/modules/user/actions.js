import Request from "@requests/user_request";

const index = async ({ commit }, query = {}) => {
    await Request.index(query).then((res) => {
        commit("SET_DATA", res.data);
    });
};

const store = async ({ commit }, data) => {
    await Request.store(data).then((res) => {
        if (res.data.status_code === 422) {
            commit("SET_ERRORS", res.data.data.message);
        }
    });
};

const detail = ({ commit }, data) => {
    commit("SET_DETAIL_DATA", data);
};

const clearDetail = ({ commit }) => {
    commit("CLEAR_DETAIL_DATA");
};

const clearError = ({ commit }) => {
    commit("CLEAR_ERROR");
};

const update = async ({}, data) => {
    await Request.update(data.id, data);
};

export default { index, store, detail, update, clearDetail, clearError };
