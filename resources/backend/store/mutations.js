const toggleSidebar = (state) => {
    state.sidebarVisible = !state.sidebarVisible
};
const toggleUnfoldable = (state) => {
    state.sidebarUnfoldable = !state.sidebarUnfoldable
};

const updateSidebarVisible = (state, payload) => {
    state.sidebarVisible = payload.value
};

export default {
	toggleSidebar,
	toggleUnfoldable,
    updateSidebarVisible
};
