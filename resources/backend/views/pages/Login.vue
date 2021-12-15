<template>
    <div class="bg-light min-vh-100 d-flex flex-row align-items-center">
        <CContainer>
            <CRow class="justify-content-center">
                <CCol :md="8">
                    <CCardGroup>
                        <CCard class="p-4">
                            <CCardBody>
                                <CForm>
                                    <h1>Login</h1>
                                    <p class="text-medium-emphasis">
                                        Sign In to your account
                                    </p>
                                    <CInputGroup class="mb-3">
                                        <CInputGroupText>
                                            <CIcon icon="cil-user" />
                                        </CInputGroupText>
                                        <CFormInput
                                            name="username"
                                            type="text"
                                            placeholder="Username"
                                            autocomplete="username"
                                            :model-value="initialValues.username"
                                            @change="initialValues.username = $event.target.value"
                                        />
                                    </CInputGroup>
                                    <CInputGroup class="mb-4">
                                        <CInputGroupText>
                                            <CIcon icon="cil-lock-locked" />
                                        </CInputGroupText>
                                        <CFormInput
                                            name="password"
                                            type="password"
                                            placeholder="Password"
                                            autocomplete="current-password"
                                            :model-value="initialValues.password"
                                            @change="initialValues.password = $event.target.value"
                                        />
                                    </CInputGroup>
                                    <CRow>
                                        <CCol :xs="6">
                                            <CButton
                                                @click.prevent="login"
                                                color="primary"
                                                class="px-4"
                                            >
                                                Login
                                            </CButton>
                                        </CCol>
                                    </CRow>
                                </CForm>
                            </CCardBody>
                        </CCard>
                        <CCard
                            class="text-white bg-primary py-5"
                            style="width: 44%"
                        >
                            <CCardBody class="text-center">
                                <div>
                                    <h2>Sign up</h2>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur
                                        adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna
                                        aliqua.
                                    </p>
                                    <CButton
                                        color="light"
                                        variant="outline"
                                        class="mt-3"
                                    >
                                        Register Now!
                                    </CButton>
                                </div>
                            </CCardBody>
                        </CCard>
                    </CCardGroup>
                </CCol>
            </CRow>
        </CContainer>
    </div>
</template>

<script>
import { reactive, ref } from '@vue/reactivity';
import { useStore } from "vuex";
import { useRouter } from 'vue-router';
export default {
    name: "Login",
    setup(props) {
        const store = useStore();
        const router = useRouter();

        const initialValues = ref({
            username: "",
            password: "",
        });

        const login = async () => {
            await store.dispatch("login", {
                username: initialValues.value.username,
                password: initialValues.value.password,
            });
            router.push({name: 'dashboard'})
        };

        return {
            login,
            initialValues
        };
    },
};
</script>
