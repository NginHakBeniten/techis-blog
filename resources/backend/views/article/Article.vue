<template>
    <CForm>
        <CInputGroup class="mb-3">
            <CInputGroupText>Title</CInputGroupText>
            <CFormInput />
        </CInputGroup>
        
        <div class="mb-3">
            <CFormLabel>Select Tags</CFormLabel>
            <multi-select
                v-model="tags"
                placeholder="-- Select Tags --"
                mode="tags"
                :closeOnSelect="false"
                :searchable="true"
                :createTag="true"
                @tag="addTag"
                @change="handleSelect"
                :options="[
                    { value: 'batman', label: 'Batman' },
                    { value: 'robin', label: 'Robin' },
                    { value: 'joker', label: 'Joker' },
                ]"
            />
        </div>
        <div class="mb-3">
            <CFormLabel for="mainImage">Main Image</CFormLabel>
            <CFormInput type="file" id="mainImage"/>
        </div>
        <div class="mb-3">
            <CFormLabel>Article</CFormLabel>
            <editor 
                :api-key="API_KEY" 
                :init="tinyMceInit"
            />
        </div>
        
    </CForm>
    
</template>

<script>
import Editor from '@tinymce/tinymce-vue';
import Multiselect from '@vueform/multiselect';
export default {
    setup() {
        const tinyMceInit = {
            plugins: 'image',
            height: 500,
            automatic_uploads: false, 
            images_upload_url: '/api/upload-image',
        }

        const addTag = (tag) => {
            console.log(tag);
        }

        const APP_KEY = process.env.TINY_MCE_APP_KEY
        let tags = ['batman'];

        return {
            tinyMceInit,
            tags,
            addTag,
            // handleSelect,
            APP_KEY
        }
    },
    components: {
        'editor': Editor,
        'multi-select': Multiselect,
    },
};
</script>

<style src="@vueform/multiselect/themes/default.css"></style>
