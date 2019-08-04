<template>
    <div class="modal-surrounding">
        <div class="modal-container">
            <div class="modal-sidebar-container">
                <div class="modal-close-button" @click='closeModal()'>X</div>
                <!-- <div class="modal-sidebar"> -->
                    <form @submit.prevent="login" method="POST" class="modal-sidebar">
                        <div class="alert alert-danger" id="invalid-login">Invalid Login Credentials!</div>
                        <input v-model="email" type="text" class="modal-input" placeholder="email">
                        <input v-model="password" type="password" class="modal-input" placeholder="password">
                        <div>
                            <label for="remember">Remember Me</label>
                            <input v-model="remember" name="remember" type="checkbox" />
                        </div>
                        <button id="loginbutton" class="button">Login</button>
                    </form>
                <!-- </rdiv> -->
            </div>
            <div class="modal-description">
                <p>Campus<br>Login</p>
            </div>
        </div>
    </div>
</template>

 <script>
import './../../sass/login-modal.scss'
import $ from "jquery";
window.axios = require("axios");
// For adding the token to axios header (add this only one time).
window.axios.defaults.headers.common = {
  _token: document
    .querySelector('meta[name="csrf-token"]')
    .getAttribute("content"),
  "X-Requested-With": "XMLHttpRequest",
  "X-CSRF-TOKEN": document
    .querySelector('meta[name="csrf-token"]')
    .getAttribute("content")
};
export default {
  name: 'login-modal',
  data() {
        return {
        email: "",
        password: "",
        remember: "",
        errors: ""
        };
  },
  methods: {
        closeModal() {
            this.$emit("closeModal", true)
        },
        login() {
        this.errors = "";
        $("#invalid-login").hide();
        $("#page-loader").show();
        $("#loginbutton").attr("disabled", true);
        axios
            .post("/signin", {
            email: this.email,
            password: this.password
            })
            .then(res => {
            $("#page-loader").show();
            if (res.data != false) {
                window.location.href = "/";
            } else {
                $("#loginbutton").attr("disabled", false);
                $("#invalid-login").show();
                $("#page-loader").hide();
            }
            })
            .catch(err => {
            $("#loginbutton").attr("disabled", false);
            $("#page-loader").hide();

            this.errors = err.response.data.errors;
            console.log(err);
            });
        }
  },
  created() {},
  mounted() {},

  computed: {
    validationErrors() {
      let errors = Object.values(this.errors);
      errors = errors.flat();
      return errors;
    }
  }
};
</script> 