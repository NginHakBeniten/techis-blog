<template>
    <base-entity
        :headers="headers"
        :data="tags"
        :totalPage="totalPage"
        :onSubmit="onSubmit"
    >
        <template v-slot:form>
            <CForm class="row">
                <div class="mb-3 col-6">
                    <CFormLabel>Tag Name</CFormLabel>
                    <CFormInput
                        name="name"
                        type="text" 
                        placeholder="Tag name"
                        :model-value="data.name"
                        @keyup="onChange"
                    />
                </div>
                <div class="mb-3 col-6">
                    <CFormLabel>Slug</CFormLabel>
                    <CFormInput
                        type="text" 
                        disabled
                        :model-value="slug"
                    />
                </div>
            </CForm>
        </template>
    </base-entity>
</template>

<script>
import BaseEntity from '@components/base/BaseEntity.vue';
import { computed, ref } from '@vue/reactivity';
import { useStore } from 'vuex';
export default {
    setup() {
        const store = useStore();

        const data = ref({
            name: ""
        });

        const onChange = (event) => {
            const {name, value} = event.target;
            return {
                ...data.value
                [name] = value
            }
        }

        const onSubmit = () => {
            store.dispatch('tag/store', {
                ...data.value,
                slug: slug.value
            })
        }

        const slug = computed(() => {
            return data.value.name.toLowerCase().replace(/ /g, '-');
        })

        return {
            onChange,
            onSubmit,
            data,
            slug
        }
    },
    components: {
        BaseEntity
    },
};
</script>
