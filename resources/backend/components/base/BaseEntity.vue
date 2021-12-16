<template>
    <slot name="form"> </slot>
    <div class="text-right">
        <CButton 
            class="custom-action-btn" 
            color="primary"
            @click="onSubmit"
        >
            {{ id ? "Update" : "Add New" }}
        </CButton>
    </div>
</template>

<script>
import { useRoute } from 'vue-router';
export default {
    props: {
        onSubmit: {
            type: Function,
            required: true
        }
    },
    setup(props, { emit }) {
        const route = useRoute();
        const id = +route.params.id;

        console.log(props);


        return {
            ...props,
            id,
        };
    },
};
</script>
