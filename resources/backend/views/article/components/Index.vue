<template>
    <base-index
        :headers="headers"
        :data="data"
        :totalPage="totalPage"
    ></base-index>
</template>

<script>
import { articles } from "../articles.js";
import { columns } from "../column.js";
import BaseIndex from "../../../components/base/BaseIndex.vue";
import { useRouter } from "vue-router";
export default {
    components: { BaseIndex },
    setup(props, { emit }) {
        const router = useRouter();
        const data = articles;

        const headers = columns
            .filter((c) => c.title !== "ID")


        return { headers, totalPage: 5, data };
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
