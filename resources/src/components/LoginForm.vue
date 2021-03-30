<template>
  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input
      @focus="clearError()"
      type="text"
      placeholder="Enter Username"
      v-model="data.name"
    />

    <label for="psw"><b>Password</b></label>
    <input
      @focus="clearError()"
      type="password"
      placeholder="Enter Password"
      v-model="data.pass"
    />

    <div>
      <button @click="login()" class="login">Login</button>
      <button @click="register()" class="register">Register</button>
    </div>

    <p v-show="loginErrorShow" style="color: red">
      The name or password is incorrect
    </p>
    <div v-for="(error, index) in errors" :key="index">
      <div v-for="(item, index) in error" :key="index">
        <p style="color: red">{{ item }}</p>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters } from "vuex";

export default {
  data() {
    return {
      data: {
        name: "",
        pass: "",
      },
      errors: [],
      loginErrorShow: false,
    };
  },
  methods: {
    async login() {
      await this.$store.dispatch("loginAction", this.data);
      if (this.token.access_token) {
        $cookies.config(60 * 60, "", "", true);
        $cookies.set("token", this.token.access_token, 24 * 60 * 60);
        this.$router.push({ path: "first" });
      } else if (this.token.error) {
        this.loginErrorShow = true;
      }
    },
    async register() {
      await this.$store.dispatch("registerAction", this.data);
      if (this.dataRegister.errors) {
        this.errors = this.dataRegister.errors;
      }
    },
    clearError() {
      this.errors = [];
      this.loginErrorShow = false;
    },
  },
  computed: {
    ...mapGetters({
      token: "token",
      dataRegister: "dataRegister",
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
.login {
  background-color: #4caf50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}
.register {
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
