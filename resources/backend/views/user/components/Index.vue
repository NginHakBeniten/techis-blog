<template>
    <base-index
        :columns="columns"
        :data="data"
        :meta="meta"
        :onClickPage="onClickPage"
        :getDetail="getDetail"
    ></base-index>
</template>

<script>
import { columns } from "../column.js";
import BaseIndex from "../../../components/base/BaseIndex.vue";
import { computed, onMounted } from "@vue/runtime-core";
import store from '@/store'

export default {
    components: { BaseIndex },
    setup() {
        const onClickPage = (page) => {
            store.dispatch("user/index", { page });
        };

        const getDetail = (data) => {
            store.dispatch("user/detail", data);
        };

        onMounted(() => {
            store.dispatch("user/index");
        });

        const data = computed(() => store.getters["user/all"]);
        const meta = computed(() => store.getters["user/meta"]);

        return {
            columns,
            data,
            getDetail,
            headers: columns,
            meta,
            onClickPage,
        };
    },
};
</script>
