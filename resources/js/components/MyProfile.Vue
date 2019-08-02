<template>
  <div>
    <div>
      <div class="container">
        <table v-if="users.length != 0" class="table table-bordered">
          <thead>
            <tr>
              <th>Firstname</th>
              <th>Lastname</th>
              <th>Email</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(user, key) in users" :key="key">
              <td>{{user.StudentFirstName}}</td>
              <td>{{user.StudentLastName}}</td>
              <td>{{user.StudentEmail}}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div v-if="courses.length != 0">
      Courses:
      <ul>
        <li v-for="(course, key) in courses" :key="key">Course Name: {{course.CourseName}}</li>
      </ul>
    </div>
  </div>
</template>


<script>
import $ from "jquery";

window.axios = require("axios");
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
      userid: this.$route.params.userid,
      courseid: this.$route.params.courseid,
      admin: this.$route.params.admin,
      courses: [],
      users: []
    };
  },

  methods: {
    checkIfAdmin() {
      axios
        .post("/checkadmin/")
        .then(res => {
          console.log(res.data);
          this.admin = res.data;
        })
        .catch(err => {
          alert(err);
        });
    },
    isLoggedIn() {
      axios
        .post("/checklogin/")
        .then(res => {
          console.log(res.data);
          this.userid = res.data;
          this.fetchUser();
          this.fetchUserCourses();
        })
        .catch(err => {
          alert(err);
        });
    },
    fetchUser() {
      axios
        .post("/getuser", {
          userid: this.userid,
          admin: this.admin
        })
        .then(res => {
          console.log(res.data);
          this.users = res.data;
        })
        .catch(err => {
          alert(err);
        });
    },
    fetchUserCourses() {
      axios
        .post("/getusercourses", {
          userid: this.userid
        })
        .then(res => {
          $("#page-loader").hide();
          console.log(res.data);
          this.courses = res.data;
        })
        .catch(err => {
          alert(err);
        });
    }
  },
  created() {
    $("#page-loader").show();
    this.isLoggedIn();
    this.checkIfAdmin();
  },
  mounted() {}
};
</script>


<style>
</style>
