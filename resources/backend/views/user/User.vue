<template>
  <CForm>
    <div class="mb-3">
      <CFormLabel for="exampleFormControlInput1">Email address</CFormLabel>
      <CFormInput
        type="email"
        id="exampleFormControlInput1"
        placeholder="name@example.com"
      />
    </div>
    <div class="mb-3">
      <CFormLabel for="exampleFormControlTextarea1"
        >Example textarea</CFormLabel
      >
      <CFormTextarea id="exampleFormControlTextarea1" rows="3"></CFormTextarea>
    </div>
  </CForm>
</template>

<script>
import { onMounted, onUpdated, onUnmounted } from 'vue'
export default {
  setup() {
    // onMounted(() => {
    //   console.log("mounted!");
    // });
  },
};
</script>

<style>
</style>