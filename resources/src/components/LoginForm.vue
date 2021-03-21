<template>
  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input
      type="text"
      placeholder="Enter Username"
      v-model="dataLogin.name"
      required
    />

    <label for="psw"><b>Password</b></label>
    <input
      type="password"
      placeholder="Enter Password"
      v-model="dataLogin.pass"
      required
    />

    <button @click="submit()">Login</button>

    <p v-if="this.token.error" style="color: red">The name or password is incorrect</p>
  </div>
</template>

<script>
import { mapGetters } from "vuex";

export default {
  data() {
    return {
      dataLogin: {
        name: "",
        pass: "",
      },
    };
  },
  methods: {
    async submit() {
      await this.$store.dispatch("loginAction", this.dataLogin);
      if (this.token.access_token) {
        sessionStorage.setItem('token',this.token.access_token);
        this.$router.push({ path: "first" });
      }
    },
  },
  computed: {
    ...mapGetters({
      token: "token",
    }),
  },
};
</script>

<style>
input[type="text"],
input[type="password"] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}
.container {
  margin: auto;
  width: 60%;
  padding: 16px;
}
@media screen and (max-width: 300px) {
  span.psw {
    display: block;
    float: none;
  }
  .cancelbtn {
    width: 100%;
  }
}
button {
  background-color: #4caf50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}
</style>
