<template>
    <base-index
        :headers="headers"
        :data="data"
        :totalPage="totalPage"
    ></base-index>
</template>

<script>
import { columns } from "../column.js";
import BaseIndex from "../../../components/base/BaseIndex.vue";
import { useStore } from 'vuex';
import { onMounted, ref } from 'vue';

export default {
    components: { BaseIndex },
    setup(props, { emit }) {

        const store = useStore();

        console.log(store);

        const headers = columns.filter((c) => c.title !== "ID")

        const data = ref([])
        const getTags = async () => {
            data.value = await store.dispatch('tag/getTags')
        }

        console.log(da);

        onMounted(() => {
            getTags();
        });
        return { 
            headers, 
            totalPage: 5, 
            data: data.value.data,
            getTags
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
