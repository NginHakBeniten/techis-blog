<template>
    <CTable>
        <CTableHead color="dark">
            <CTableRow>
                <CTableHeaderCell scope="col">#</CTableHeaderCell>
                <CTableHeaderCell scope="col">Username</CTableHeaderCell>
                <CTableHeaderCell scope="col">Email</CTableHeaderCell>
                <CTableHeaderCell scope="col">Role</CTableHeaderCell>
                <CTableHeaderCell class="center" scope="col"
                    >Action</CTableHeaderCell
                >
            </CTableRow>
        </CTableHead>
        <CTableBody>
            <CTableRow
                align="middle"
                :key="user.id"
                v-for="(user, index) in users"
            >
                <CTableHeaderCell scope="row">{{ index }}</CTableHeaderCell>
                <CTableDataCell>{{ user.username }}</CTableDataCell>
                <CTableDataCell>{{ user.email }}</CTableDataCell>
                <CTableDataCell>{{ user.role }}</CTableDataCell>
                <CTableDataCell class="center">
                    <router-link
                        :to="{
                            name: `update`,
                            params: { id: user.id },
                        }"
                    >
                        <CButton @click="updateHandler()" class="custom-action-btn" color="primary">
                            Update</CButton
                        >
                    </router-link>
                    <CButton class="custom-action-btn" color="danger"
                        >Delete</CButton
                    >
                </CTableDataCell>
            </CTableRow>
        </CTableBody>
    </CTable>
    <CPagination align="center" aria-label="Page navigation example">
        <CPaginationItem disabled>Previous</CPaginationItem>
        <CPaginationItem active="true" href="#">1</CPaginationItem>
        <CPaginationItem href="#">2</CPaginationItem>
        <CPaginationItem href="#">3</CPaginationItem>
        <CPaginationItem href="#">Next</CPaginationItem>
    </CPagination>
</template>

<script>
import { users } from "./user.js";
export default {
    setup() {
        return { users };
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
