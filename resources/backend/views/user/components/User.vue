<template>
    <CForm>
        <div class="mb-3">
            <CFormLabel for="username">Username</CFormLabel>
            <CFormInput
                type="text"
                id="username"
                placeholder="example"
                :value="user.username"
            />
        </div>
        <div class="mb-3">
            <CFormLabel for="email">Email address</CFormLabel>
            <CFormInput
                type="email"
                id="email"
                placeholder="name@example.com"
                :value="user.email"
            />
        </div>
        <div class="mb-3">
            <CFormLabel for="role">User Role</CFormLabel>
            <CFormSelect id="role">
                <option>-- Select Role --</option>
                <option value="Admin" :selected="user.role === 'Admin'">
                    Admin
                </option>
                <option value="Editor" :selected="user.role === 'Editor'">
                    Editor
                </option>
            </CFormSelect>
        </div>
    </CForm>
    <div class="text-right">
        <CButton
            @click="addNewHandler"
            class="custom-action-btn"
            color="primary"
            >{{ userId ? "Update" : "Add New" }}</CButton
        >
    </div>
</template>

<script>
import { useRoute } from "vue-router";
import { users } from "../user.js";
export default {
    setup(props, {}) {
        const route = useRoute();
        const userId = +route.params.id;
        let user;
        if (!userId) {
            user = {
                username: "",
                email: "",
                role: "",
            };
        } else {
            user = users.find((u) => u.id === userId);
        }

        return { user, userId };
    },
};
</script>

<style></style>
