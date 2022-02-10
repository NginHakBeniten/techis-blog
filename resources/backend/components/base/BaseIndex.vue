<template>
    <div
        v-show="isSearch && isAddNew"
        class="d-md-flex justify-content-md-between mb-3"
    >
        <CFormInput
            v-show="isSearch"
            class="w-50"
            placeholder="Search..."
            aria-label="Search..."
            aria-describedby="button-addon2"
        />
        <CButton @click="addNewHandler" v-show="isAddNew" color="primary">
            Add New
        </CButton>
    </div>
    <CTable hover>
        <CTableHead color="dark">
            <CTableRow>
                <CTableHeaderCell scope="col">#</CTableHeaderCell>
                <template :key="column.title" v-for="column in columns">
                    <CTableHeaderCell scope="col">{{
                        column.title
                    }}</CTableHeaderCell>
                </template>
                <CTableHeaderCell class="text-center" scope="col"
                    >Action</CTableHeaderCell
                >
            </CTableRow>
        </CTableHead>
        <CTableBody>
            <CTableRow
                align="middle"
                :key="index"
                v-for="(item, index) in data"
            >
                <CTableHeaderCell scope="row">{{ index + 1 }}</CTableHeaderCell>
                <template :key="column.id" v-for="column in columns">
                    <CTableDataCell>{{ item[column.key] }}</CTableDataCell>
                </template>

                <CTableDataCell class="text-center">
                    <router-link
                        :to="{
                            name: 'update-user',
                            params: { id: item.id },
                        }"
                    >
                        <CButton
                            @click="getDetail(item)"
                            class="custom-action-btn"
                            color="primary"
                            size="sm"
                        >
                            <i class="bi bi-pencil"></i>
                        </CButton>
                    </router-link>

                    <CButton
                        class="custom-action-btn text-white"
                        color="danger"
                        size="sm"
                    >
                        <i class="bi bi-trash"></i>
                    </CButton>
                </CTableDataCell>
            </CTableRow>
        </CTableBody>
    </CTable>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-end">
            <li :class="[{ disabled: !meta.prev_page }, 'page-item']">
                <button
                    :disabled="!meta.prev_page"
                    @click="onClickPage(meta.current_page - 1)"
                    class="page-link"
                >
                    Previous
                </button>
            </li>
            <li
                :class="[{ active: meta.current_page === page }, 'page-item']"
                :key="page"
                v-for="page in meta.total_page"
            >
                <button @click="onClickPage(page)" class="page-link">
                    {{ page }}
                </button>
            </li>
            <li :class="[{ disabled: !meta.next_page }, 'page-item']">
                <button
                    :disabled="!meta.next_page"
                    @click="onClickPage(meta.current_page + 1)"
                    class="page-link"
                >
                    Next
                </button>
            </li>
        </ul>
    </nav>
</template>

<script>
import { computed } from "@vue/reactivity";
import { useRouter } from "vue-router";
import ButtonGroups from "../../views/buttons/ButtonGroups.vue";
import { useStore } from "vuex";
export default {
    components: { ButtonGroups },
    name: "BaseIndex",
    props: {
        columns: {
            type: Array,
        },
        data: {
            type: Array,
        },
        meta: {
            type: Object,
        },
        isAddNew: {
            type: Boolean,
            default: true,
        },
        isSearch: {
            type: Boolean,
            default: true,
        },
        onClickPage: {
            type: Function,
        },
        getDetail: {
            type: Function,
            required: true,
        },
    },
    setup(props) {
        const router = useRouter();
        const store = useStore();
        const addNewHandler = () => {
            router.push({ path: `${path.value}/create` });
            store.dispatch("user/clearDetail");
        };

        const path = computed(() => router.currentRoute.value.path);

        return {
            addNewHandler,
            path,
            ...props,
        };
    },
};
</script>

<style scope>
.custom-action-btn {
    margin: 0 10px;
}
</style>
