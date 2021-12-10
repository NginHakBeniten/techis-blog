<template>
    <slot name="form"> </slot>
    <div class="text-right">
        <CButton class="custom-action-btn" color="primary">{{id ? 'Update' : 'Add New'}}</CButton>
    </div>
</template>

<script>
export default {
    props: {

    },
    setup(props) {
         const route = useRoute();
        const id = +route.params.id;

        return {
            ...props,
            id
        };
    },
};
</script>
