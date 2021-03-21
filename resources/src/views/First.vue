<template>
  <div class="container">
    <div class="header">
      <Header></Header>
    </div>
    <div class="firstcontent">
      <FirstContent></FirstContent>
    </div>
  </div>
</template>

<script>
import Header from "../components/Header";
import FirstContent from "../components/FirstContent";

export default {
  name: "First",
  components: {
    Header,
    FirstContent,
  },
  methods: {},
};
</script>

<style>
.container {
  width: 70%;
  margin: auto;
}
.firstcontent {
  margin-top: 22vh;
}
</style>