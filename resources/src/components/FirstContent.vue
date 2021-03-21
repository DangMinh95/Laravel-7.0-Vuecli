<template>
  <div class="container">
    <div v-if="files">
      <img :src="files" height="70" width="90" alt="No image" />
    </div>
    <div>
      <input
        type="file"
        name="file"
        @change="onloadChange($event)"
        accept="image/*"
      />
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      files: "",
    };
  },
  methods: {
    onloadChange(event) {
      let file = event.target.files || event.dataTransfer.files;
      if (!file.length) {
        return;
      }
      this.createImage(file[0]);
    },
    createImage(file) {
      let reader = new FileReader();
      let vm = this;
      reader.onload = (e) => {
        vm.files = e.target.result;
      };
      reader.readAsDataURL(file);
    },
  },
  computed: {},
  watch: {},
};
</script>

<style>
</style>