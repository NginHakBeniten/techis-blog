<template>
    <CForm>
        <div class="mb-3">
            <CFormLabel for="username">Username</CFormLabel>
            <CFormInput type="text" id="username" placeholder="example" />
        </div>
        <div class="mb-3">
            <CFormLabel for="email">Email address</CFormLabel>
            <CFormInput
                type="email"
                id="email"
                placeholder="name@example.com"
            />
        </div>
        <div class="mb-3">
            <CFormLabel for="role">User Role</CFormLabel>
            <CFormSelect
                id="role"
                aria-label="Default select example"
                :options="[
                    'Role',
                    { label: 'Admin', value: 'Admin' },
                    { label: 'Editor', value: 'Editor' },
                ]"
            >
            </CFormSelect>
        </div>
        <div class="mb-3">
            <CButton class="custom-action-btn" color="primary">Update</CButton>
        </div>
    </CForm>
</template>

<script>
import { onBeforeRouteUpdate, useRoute } from "vue-router";
export default {
    setup(props) {
        const route = useRoute();
        console.log("route", route.params);
        // onBeforeRouteUpdate((to, from) => {
        // console.log("to", to);
        // only fetch the user if the id changed as maybe only the query or the hash changed
        // if (to.params.id !== from.params.id) {
        //     userData.value = await fetchUser(to.params.id);
        // }
        // });

        // onMounted(() => {
        //   console.log("mounted!");
        // });
    },
};
</script>

<style></style>
