<template>
  <div>
    <button @click="logout()" class="logout">Logout</button>
    <img src="../assets/logo.png" alt="The image path is broken" class="logo" />
  </div>
</template>

<script>
import { mapGetters } from "vuex";

export default {
  data() {
    return {};
  },
  methods: {
    async logout() {
      await this.$store.dispatch("logout");
      if (this.logoutConfirm.message) {
        $cookies.remove("token");
        this.$router.push({ path: "login" });
      }
    },
  },
  computed: {
    ...mapGetters({
      logoutConfirm: "logoutConfirm",
    }),
  },
};
</script>

<style>
.logout {
  margin-right: 40px;
  background-color: #4caf50;
  color: white;
  padding: 14px 20px;
  border: none;
  cursor: pointer;
  width: 90px;
  float: right;
}
button:hover {
  opacity: 0.8;
}
.container {
  margin: auto;
  width: 60%;
  padding: 16px;
}
.logo {
  float: left;
  width: 50px;
  margin-left: 40px;
}
</style>