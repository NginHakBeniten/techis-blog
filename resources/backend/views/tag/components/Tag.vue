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
                        :model-value="data.slug"
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
import { useRouter } from 'vue-router';
import { onMounted } from '@vue/runtime-core';
export default {
    setup() {
        const store = useStore();
        const router = useRouter();
        const id = +router.currentRoute.value.params.id;
        const data = ref({
            name: "",
            slug: ""
        });

        data.value.slug = computed(() => {
            return data.value.name.toLowerCase().replace(/ /g, '-');
        })

        onMounted(() => {
            if (id) {
                store.dispatch('tag/showTag', id).then((res) => {
                    data.value.name = res.data.name
                })
            }
        })

        const onChange = (event) => {
            const {name, value} = event.target;
            return {
                ...data.value
                [name] = value
            }
        }

        const onSubmit = () => {
            if (id) {
                store.dispatch('tag/update', {
                    id,
                    ...data.value
                })
            } else {
                store.dispatch('tag/store', data.value)
            }
            router.back()
        }

        return {
            onChange,
            onSubmit,
            data
        }
    },
    components: {
        BaseEntity
    },
};
</script>
