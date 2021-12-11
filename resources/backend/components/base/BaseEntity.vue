<template>
    <slot name="form"> </slot>
    <div class="text-right">
        <CButton class="custom-action-btn" color="primary">{{
            id ? "Update" : "Add New"
        }}</CButton>
    </div>
</template>

<script>
export default {
    props: {},
    setup(props, { emit }) {
        const route = useRoute();
        const id = +route.params.id;
        console.log(emit);
        return {
            ...props,
            id,
        };
    },
};
</script>
