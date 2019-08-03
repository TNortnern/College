<template>
  <div>
    <form @submit.prevent="register" action method="post">
      <div class="form-group">
        <label for="firstname">First Name</label>
        <input
          type="text"
          class="form-control"
          name
          id
          placeholder="Enter First Name"
          v-model="firstname"
        />
      </div>
      <div class="form-group">
        <label for="lastname">Last Name</label>
        <input
          type="text"
          class="form-control"
          name
          id
          placeholder="Enter Last Name"
          v-model="lastname"
        />
      </div>
      <div class="form-group">
        <label for="email">E-mail Address</label>
        <input
          type="text"
          class="form-control"
          name
          id
          placeholder="Enter E-mail Address"
          v-model="email"
        />
      </div>
      <div class="form-group">
        <label for="pnum">Phone Number</label>
        <input
          type="text"
          class="form-control"
          name
          id
          placeholder="Enter Phone Number"
          v-model="pnum"
        />
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input
          type="text"
          class="form-control"
          name
          id
          placeholder="Enter Password"
          v-model="password"
        />
      </div>
      <div class="form-group">
        <label for="password_confirmation">Confirm Password</label>
        <input
          type="text"
          class="form-control"
          name
          id
          placeholder="Confirm Password"
          v-model="confirm"
        />
      </div>
      <button class="btn btn-primary">Register</button>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      firstname: "",
      lastname: "",
      email: "",
      password: "",
      confirm: "",
      pnum: ""
    };
  },
  methods: {
    register() {
      axios
        .post("/register", {
          firstname: this.firstname,
          lastname: this.lastname,
          email: this.email,
          phonenumber: this.pnum,
          password: this.password,
          password_confirmation: this.password
        })
        .then(res => {
          console.log(res.data);
          window.location.href = "/";
        })
        .catch(err => {
          alert(err);
        });
    }
  },

  created() {}
};
</script>