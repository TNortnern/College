<template>
    <div class="console" v-if="admin && userid">
        <navbar v-bind:studentCredentials='studentCreds' v-bind:instructorCredentials='instructorCreds' v-bind:profileData='userid'></navbar>
        <div class="console-background">
            hello
        </div>
    </div>
</template>

<script>
    import './../../sass/console.scss'
    import navbar from './Navbar'

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
        components: {
            navbar,
        },
        data: function() {
            return {
                studentCreds: false,
                instructorCreds: false,
                userid: this.$route.params.userid,
                admin: undefined
            }
        },
        methods: {
           
            fetchUserCourses() {
        axios
        .post("/getusercourses", {
          userid: this.userid
        })
        .then(res => {
          console.log(res.data)
          $("#page-loader").hide();

          this.courses = res.data;
        })
        .catch(err => {
          alert(err);
        });
    }
        },
        created() {
            console.log(this.userid)
            $("#page-loader").show();
            this.isLoggedIn();
        },
    }
</script>
