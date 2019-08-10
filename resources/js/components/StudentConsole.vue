<template>
    <div class="console">
        <studentNavbar></studentNavbar>
        <div class="console-background"></div>
    </div>
</template>

<script>
    import './../../sass/console.scss'
    import studentNavbar from './StudentNavbar'

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
            studentNavbar,
        },
        data: function() {
            return {
                userid: window.sessionStorage.userId,
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
                    $("#page-loader").hide();

                    this.courses = res.data;
                })
                .catch(err => {
                alert(err);
                });
        },
            isLoggedIn() {
            axios
                .post("/checklogin/")
                .then(res => {
                this.checkIfAdmin();
                })
                .catch(err => {
                alert(err);
                });
            },
            checkIfAdmin() {
            axios
                .post("/checkadmin/")
                .then(res => {
                    this.admin = res.data;
                })
                .catch(err => {
                alert(err);
                });
            }
        },
        created() {
            $("#page-loader").show();
            this.isLoggedIn();
        },
    }
</script>
