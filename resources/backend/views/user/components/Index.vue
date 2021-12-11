<template>
    <base-index
        :headers="headers"
        :data="data"
        :totalPage="totalPage"
    ></base-index>
</template>

<script>
import { users } from "../user.js";
import { columns } from "../column.js";
import BaseIndex from "../../../components/base/BaseIndex.vue";
import { useRouter } from "vue-router";
export default {
    components: { BaseIndex },
    setup(props, { emit }) {
        const router = useRouter();
        const data = users.map((user) => {
            const slugColumns = columns.map((c) => c.slug);
            return Object.keys(user)
                .filter((key) => slugColumns.includes(key))
                .reduce((cur, key) => {
                    return { ...cur, [key]: user[key] };
                }, {});
        });
        const headers = columns
            .filter((c) => c.title !== "ID")
            .map((c) => c.title);


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
