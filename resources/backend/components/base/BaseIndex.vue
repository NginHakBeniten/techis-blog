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
        <CButton @click="addNewHandler" v-show="isAddNew" color="primary"
            >Add New</CButton
        >
    </div>
    <CTable>
        <CTableHead color="dark">
            <CTableRow>
                <CTableHeaderCell scope="col">#</CTableHeaderCell>
                <template :key="header" v-for="header in headers">
                    <CTableHeaderCell scope="col">{{
                        header
                    }}</CTableHeaderCell>
                </template>
                <CTableHeaderCell scope="col"
                    >Action</CTableHeaderCell
                >
            </CTableRow>
        </CTableHead>
        <CTableBody>
            <CTableRow
                align="middle"
                :key="index"
                v-for="(user, index) in data"
            >
                <CTableHeaderCell scope="row">{{ index + 1 }}</CTableHeaderCell>
                <template :key="value.id" v-for="(value, key) in user">
                    <CTableDataCell v-if="key !== 'id'">{{
                        value
                    }}</CTableDataCell>
                </template>

                <CTableDataCell>
                    <router-link
                        :to="{
                            name: `update`,
                            params: { id: user.id },
                        }"
                    >
                        <CButton class="custom-action-btn" color="primary"
                            >Update</CButton
                        >
                    </router-link>
                    <CButton class="custom-action-btn" color="danger"
                        >Delete</CButton
                    >
                </CTableDataCell>
            </CTableRow>
        </CTableBody>
    </CTable>
    <CPagination align="left" aria-label="Page navigation example">
        <CPaginationItem disabled>Previous</CPaginationItem>
        <CPaginationItem
            :key="page"
            v-for="page in totalPage"
            :active="page === 1"
            href="#"
            >{{ page }}</CPaginationItem
        >
        <CPaginationItem href="#">Next</CPaginationItem>
    </CPagination>
</template>

<script>
import { useRouter } from "vue-router";
export default {
    name: "BaseIndex",
    props: {
        headers: {
            type: Array,
        },
        data: {
            type: Array,
        },
        isAddNew: {
            type: Boolean,
            default: true,
        },
        isSearch: {
            type: Boolean,
            default: true,
        },
        totalPage: {
            type: Number,
            required: true,
        },
    },
    setup(props) {
        const router = useRouter();
        const addNewHandler = () => {
            router.push({ name: "create" });
        };
        return {
            addNewHandler,
            ...props,
        };
    },
};
</script>
