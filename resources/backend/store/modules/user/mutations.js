const SET_DATA = (state, res) => {
    state.data = res.data;
    state.meta = res.meta;
};

const SET_DETAIL_DATA = (state, res) => {
    state.detail = res;
};

const SET_ERRORS = (state, res) => {
    state.errors = res;
};

const CLEAR_DETAIL_DATA = (state) => {
    state.detail = {};
};

const CLEAR_ERROR = (state) => {
    state.errors = {};
};

export default {
    SET_DATA,
    SET_DETAIL_DATA,
    CLEAR_DETAIL_DATA,
    SET_ERRORS,
    CLEAR_ERROR,
};
