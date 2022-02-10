<template>
    <base-entity :onSubmit="onSubmit" :btnText="btnText">
        <template v-slot:form>
            <CForm>
                <div class="mb-3">
                    <CFormLabel for="username">Username</CFormLabel>
                    <CFormInput
                        type="text"
                        id="username"
                        name="username"
                        placeholder="example"
                        :model-value="initialValues.username"
                        @change="onChange"
                        :invalid="!!errors.username"
                    />
                    <CFormFeedback :invalid="!!errors.username">
                        {{ errors.username && errors.username[0] }}
                    </CFormFeedback>
                </div>
                <div class="mb-3">
                    <CFormLabel for="email">Email address</CFormLabel>
                    <CFormInput
                        type="email"
                        id="email"
                        name="email"
                        placeholder="name@example.com"
                        :model-value="initialValues.email"
                        @change="onChange"
                        :invalid="!!errors.email"
                    />
                    <CFormFeedback :invalid="!!errors.email">
                        {{ errors.email && errors.email[0] }}
                    </CFormFeedback>
                </div>
                <template v-if="!id">
                    <div class="mb-3">
                        <CFormLabel for="password">Password</CFormLabel>
                        <CFormInput
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Password"
                            :model-value="initialValues.password"
                            @change="onChange"
                            :invalid="!!errors.password"
                        />
                        <CFormFeedback :invalid="!!errors.password">
                            {{ errors.password && errors.password[0] }}
                        </CFormFeedback>
                    </div>
                    <div class="mb-3">
                        <CFormLabel for="confirm-password"
                            >Confirm Password</CFormLabel
                        >
                        <CFormInput
                            type="password"
                            id="confirm-password"
                            name="password"
                            placeholder="Confirm Password"
                            :model-value="initialValues.passwordConfirmation"
                            @change="onChange"
                            :invalid="!!passwordConfirmationError"
                        />
                        <CFormFeedback :invalid="!!passwordConfirmationError">
                            {{ passwordConfirmationError }}
                        </CFormFeedback>
                    </div>
                </template>
                <div class="mb-3">
                    <CFormLabel for="role">User Role</CFormLabel>
                    <CFormSelect
                        :invalid="!!errors.role"
                        name="role"
                        id="role"
                        @change="onChange"
                    >
                        <option>-- Select Role --</option>
                        <option
                            value="admin"
                            :selected="initialValues.role === 'admin'"
                        >
                            Admin
                        </option>
                        <option
                            value="editor"
                            :selected="initialValues.role === 'editor'"
                        >
                            Editor
                        </option>
                    </CFormSelect>
                    <CFormFeedback :invalid="!!errors.role">
                        {{ errors.role && errors.role[0] }}
                    </CFormFeedback>
                </div>
            </CForm>
        </template>
    </base-entity>
</template>

<script>
import { computed, ref } from "@vue/reactivity";
import { useRoute, useRouter } from "vue-router";
import store from "@/store";
import BaseEntity from "../../../components/base/BaseEntity.vue";
import { onBeforeUnmount } from "@vue/runtime-core";
export default {
    components: { BaseEntity },
    setup() {
        const router = useRouter();
        const route = useRoute();

        const id = route.params.id ? +route.params.id : null;
        const detail = computed(() => store.getters["user/detail"]);
        const errors = computed(() => store.getters["user/errors"]);

        const initialValues = ref({
            username: detail.value.username,
            email: detail.value.email,
            role: detail.value.role,
            password: "",
            passwordConfirmation: "",
        });

        const passwordConfirmationError = ref(null);

        const btnText = id ? "Update" : "Add New";

        const onChange = (event) => {
            const { name, value } = event.target;
            return {
                ...(initialValues.value[name] = value),
            };
        };

        onBeforeUnmount(() => {
            store.dispatch("user/clearError");
            passwordConfirmationError.value = null;
        });

        const onSubmit = () => {
            if (id) {
                store
                    .dispatch("user/update", {
                        id,
                        username: initialValues.value.username,
                        email: initialValues.value.email,
                        role: initialValues.value.role,
                    })
                    .then(() => {
                        router.back();
                    });
            } else {
                if (
                    initialValues.value.password !==
                    initialValues.value.passwordConfirmation
                ) {
                    passwordConfirmationError.value =
                        "Password does not match.";
                }
                store
                    .dispatch("user/store", { ...initialValues.value })
                    .then(() => {
                        // router.back();
                    });
            }
        };

        return {
            initialValues,
            onChange,
            onSubmit,
            id,
            btnText,
            errors,
            passwordConfirmationError,
        };
    },
};
</script>

<style></style>
