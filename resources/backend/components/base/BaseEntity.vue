<template>
    <slot name="form"> </slot>
    <div class="text-right">
        <CButton class="custom-action-btn" color="primary" @click="onSubmit">
            {{ btnText }}
        </CButton>
    </div>
</template>

<script>
import { useRoute } from "vue-router";
export default {
    props: {
        onSubmit: {
            type: Function,
            required: true,
        },
        btnText: {
            type: String,
            required: true,
        },
    },
    setup(props) {
        const route = useRoute();
        const id = route.params.id ? +route.params.id : null;

        return {
            ...props,
            id,
        };
    },
};
</script>
