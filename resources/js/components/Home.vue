<template>
    <div>
        <navbar></navbar>
        <div data-aos-offset="0" data-aos="fade-in" class="landing-page-shell">
            <div class="title-and-search-modal">
                <p class="landing-page-title">Super Cool College of Information Technologies</p>
                <input type="text" placeholder="What are you looking for?" class="landing-page-search-bar">
                <div class="landing-page-navigation">
                    <p>Future Students</p>
                    <p>Programs and Courses</p>
                    <p>Admissions</p>
                    <p>Current Students</p>
                    <p>More Students</p>
                </div>
            </div>
            <div data-aos="fade-in-right" class="left-info-block-and-image-container">
                <div class="info-block">
                    <table>
                        <tbody>
                            <tr>
                                <td>
                                    <p class="highlighted-title">This school is great at</p>
                                    <br>
                                    <p class="highlighted-title">magical word</p>
                                </td>
                            </tr>
                            <tr>
                                <td data-aos="fade">
                                    <p class="paragraph-header">About Header 1</p>
                                    <p class="paragraph-text">{{ dummyText }}</p>
                                </td>
                            </tr>
                            <tr data-aos="fade">
                                <td>
                                    <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2100&q=80">
                                </td>
                                <td>
                                    <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2100&q=80">
                                </td>
                            </tr>
                            <tr>
                                <td data-aos="fade">
                                    <p class="paragraph-header">About Header 1</p>
                                    <p class="paragraph-text">{{ dummyText }}</p>
                                </td>
                                <td data-aos="fade">
                                    <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2100&q=80">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div data-aos="fade-up" class="right-image">
                    <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2100&q=80">
                </div>
            </div>
            <div data-aos="fade-down" class="right-info-block-container">
                <div class="right-info-block">
                    <div class="right-info-block-title">
                        <p class="title-blue">What's</p>
                        <p class="title-black">Happening</p>
                    </div>
                    <div class="info-cards-container">
                        <div data-aos="fade-up" class="info-card">
                            <div class="info-card-image">
                                <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2100&q=80">
                            </div>
                            <div class="card-body">
                                <div class="info-card-title">
                                    New Tech Leads to Great Discovery
                                </div>
                                <div class="info-card-description">
                                    {{ demmyTextSmall }}
                                </div>
                                <div class="info-card-read-more-link">
                                    Read More
                                </div>
                            </div>
                        </div>
                        <div data-aos="fade-in" class="info-card">
                            <div class="info-card-image">
                                <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2100&q=80">
                            </div>
                            <div class="card-body">
                                <div class="info-card-title">
                                    New Tech Leads to Great Discovery
                                </div>
                                <div class="info-card-description">
                                    {{ demmyTextSmall }}
                                </div>
                                <div class="info-card-read-more-link">
                                    Read More
                                </div>
                            </div>
                        </div>
                        <div data-aos="fade-in" class="info-card">
                            <div class="info-card-image">
                                <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2100&q=80">
                            </div>
                            <div class="card-body">
                                <div class="info-card-title">
                                    New Tech Leads to Great Discovery
                                </div>
                                <div class="info-card-description">
                                    {{ demmyTextSmall }}
                                </div>
                                <div class="info-card-read-more-link">
                                    Read More
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="registration-modal-container">
                <div data-aos="fade" class="registration-modal">
                    <div data-aos="flip-down" class="registration-modal-form">
                        <div v-if="validationErrors != 0" class="alert alert-danger">
                        <ul>
                            <li v-for="(error, key) in validationErrors" :key="key">{{error}}</li>
                        </ul>
                        </div>
                        <form id="registration-form" @submit.prevent="register" action method="post">
                        <table>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <input
                                            type="text"
                                            class="modal-input"
                                            placeholder="Enter First Name"
                                            v-model="firstname"
                                            />
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input
                                            type="text"
                                            class="modal-input"
                                            placeholder="Enter Last Name"
                                            v-model="lastname"
                                            />
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <input
                                            type="text"
                                            class="modal-input"
                                            placeholder="Enter E-mail Address"
                                            v-model="email"
                                            />
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input
                                            type="text"
                                            class="modal-input"
                                            placeholder="Enter Phone Number"
                                            v-model="pnum"
                                            />
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <input
                                            type="password"
                                            class="modal-input"
                                            placeholder="Enter Password"
                                            v-model="password"
                                            />
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input
                                            type="password"
                                            class="modal-input"
                                            placeholder="Confirm Password"
                                            v-model="confirm"
                                            />
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <button id="loginbutton" class="button">Register</button>
                        </form>
                    </div>
                    <div class="registration-modal-contact-info">
                        <p>Register for the University of Greater Ontario</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import './../../sass/home.scss'
    import navbar from './Navbar'
    
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
        components: {
            navbar,
        },
        data: function() {
            return {
                dummyText: "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
                demmyTextSmall: "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
                firstname: "",
                lastname: "",
                email: "",
                password: "",
                confirm: "",
                pnum: "",
                errors: ""
            }
        },
        methods: {
            register() {
            $("#page-loader").show();
            $("#loginbutton").attr("disabled", true);
            axios
                .post("/register", {
                firstname: this.firstname,
                lastname: this.lastname,
                email: this.email,
                phonenumber: this.pnum,
                password: this.password,
                password_confirmation: this.confirm
                })
                .then(res => {
                window.location.href = "/";
                })
                .catch(err => {
                    console.log(err)
                $("#page-loader").hide();
                this.errors = err.response.data.errors;
                $("#loginbutton").attr("disabled", false);
                });
            }
        },
        computed: {
            validationErrors() {
            let errors = Object.values(this.errors);
            errors = errors.flat();
            return errors;
            }
        },
        mounted() {
           
            console.log($("meta[name=login-status]").attr("content"));
        }
    }
</script>
