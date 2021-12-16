<template>
    <base-index
        :headers="headers"
        :data="tags"
        :totalPage="totalPage"
    ></base-index>
</template>

<script>
import { columns } from "../column.js";
import BaseIndex from "../../../components/base/BaseIndex.vue";
import { useStore } from 'vuex';
import { computed, onMounted } from 'vue';

export default {
    components: { BaseIndex },
    setup(props, { emit }) {

        const store = useStore();

        const headers = columns.filter((c) => c.title !== "ID")

        onMounted(() => {
            store.dispatch('tag/getTags')
        });

        return { 
            headers, 
            totalPage: 5,
            tags: computed(() => store.getters['tag/all'])
        };
    },
};
</script>

<style scope>
.custom-action-btn {
    margin: 0 10px;
}

.center {
    text-align: center;
}
</style>
