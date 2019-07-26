<template>
  <div>
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Students</div>

          <div class="card-body">
            <h2>List of Students</h2>

            <form @submit.prevent="create" method="POST">
              <h1>Create a Student</h1>
              <div class="form-group">
                <label for="fname">First Name</label>
                <input
                  v-model="FName"
                  type="text"
                  class="form-control"
                  name="fname"
                  id="fname"
                  placeholder="Enter First Name"
                />
              </div>
              <div class="form-group">
                <label for="lname">Last Name</label>
                <input
                  v-model="LName"
                  type="text"
                  class="form-control"
                  name="lname"
                  placeholder="Enter Last Name"
                />
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input
                  v-model="Email"
                  type="email"
                  class="form-control"
                  name="email"
                  placeholder="Enter Email"
                />
              </div>
              <div class="form-group">
                <label for="phonenum">Phone Number</label>
                <input
                  v-model="PNum"
                  type="tel"
                  class="form-control"
                  name="phonenum"
                  placeholder="Enter Phone Number"
                />
              </div>
              <div class="form-group">
                <label for="home">Homestate</label>
                <input
                  v-model="Home"
                  type="text"
                  class="form-control"
                  name="home"
                  placeholder="Enter Home State"
                />
              </div>
              <!-- <div class="form-group">
                <label for="date">Birth Date</label>
                <input
                  v-model="Date"
                  type="date"
                  class="form-control"
                  name="date"
                  placeholder="Enter Birth Date"
                />
              </div>-->
              <div class="form-group">
                <label for="gender">Gender</label>
                <input
                  v-model="Gender"
                  type="text"
                  class="form-control"
                  name="gender"
                  placeholder="Enter Gender"
                />
              </div>
              <button class="btn btn-primary">Create Student</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div>
      <hr />
      <h4
        v-for="(student,key) in students"
        :key="key"
      >{{(key+1) + '. ' + student.StudentFirstName + ' ' + student.StudentLastName }}</h4>
      <hr />
    </div>
  </div>
</template>

<script>
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
  data() {
    return {
      students: [],
      FName: "",
      LName: "",
      Email: "",
      PNum: "",
      Home: "",
      Date: "",
      Gender: ""
    };
  },
  methods: {
    fetchStudents() {
      axios
        .get("/students")
        .then(res => {
          this.students = res.data;
        })
        .catch(err => {
          alert(err);
        });
    },
    create() {
      axios
        .post("/students/", {
          FName: this.FName,
          LName: this.LName,
          Email: this.Email,
          PNum: this.PNum,
          Home: this.Home,
          Gender: this.Gender
        })
        .then(res => {
          this.students.unshift(res.data);
          this.FName = "";
          this.LName = "";
          this.Email = "";
          this.PNum = "";
          this.Home = "";
          this.Date = "";
          this.Gender = "";
        })
        .catch(err => {
          alert(err);
        });
    }
  },
  created() {
    this.fetchStudents();
    console.log(
      document.querySelector('meta[name="csrf-token"]').getAttribute("content")
    );
  }
};
</script>
