<template>
    <div class="console" style="position:relative">
        <studentNavbar :profileData='userid'></studentNavbar>


                <div id="main-spinner" v-if="courses.length == 0 && !nocourses" style="position:absolute;top:50%; left:50%" class="spinner-border text-info text-center" role="status">
			<span class="sr-only">Loading...</span>
		</div>

	<div class="console-background">
		<div class="container text-center" style="padding:11%">
			<h1>Courses you are taking</h1>
			<h2 v-if="nocourses" style="color:black;font-weight:bold">You aren't taking any courses</h2>
			<div>
				<div class="accordion" id="accordion">
					<div v-for="(course,key) in courses" :key=key class="card">
						<div class="card-header" id="headingOne">
							<h2 class="mb-0">
								<button @click="getCourse(course.CourseID)" class="btn btn-link" type="button" data-toggle="collapse" :data-target="'#' + course.CourseName" aria-expanded="true" :aria-controls="course.CourseName">
            {{ course.CourseName }}
            </button>
							</h2>
						</div>
						<div :id="course.CourseName" class="collapse" :aria-labelledby="'heading' + key " data-parent="#accordion">
							<div class="card-body">
								<h4>Course Details</h4>
								<div v-for="(detail, key) in coursedetails" class="coursedetails d-flex justify-content-center">
                                    <div class="card mb-3" style="max-width: 540px;">
                                        <div class="row no-gutters">
                                            <div class="col-md-4">
                                            <p class="card-text">Details</p>
                                            <p class="card-text">Instructor: {{detail.InstructorFirstName}} {{detail.InstructorLastName}}</p>
                                            <p class="card-text">Program: {{ detail.Program }}
                                             <p class="card-text">Starts: {{ detail.StartDate }}, {{ detail.SemesterTaught }} at {{ detail.ClassTime }}</p>
                                             <p class="card-text">Ends: {{detail.EndDate}}</p>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ detail.CourseName }}({{detail.CreditHours}} Credits)</h5>
                                                    <p class="card-text">{{ detail.Description }}</p>
                                                </div>
                                            </div>
                                         </div>
                                    </div>
                
									<div v-if="!coursedetails" class="spinner-border text-primary" role="status">
										<span class="sr-only">Loading...</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
</div>
            </div>
        </div>
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
                admin: undefined,
                courses: [],
                nocourses: '',
                coursedetails: ''
            }
        },
        methods: {
             dropCourse(courseid, instructorid) {
      $("#page-loader").show();
      axios
        .post("/dropcourse", {
          courseid: courseid,
          instructorid: instructorid,
          userid: this.userid
        })
        .then(res => {
          this.courses = "";
          this.fetchCourses();
           $("#studentModal").modal("show");
        })
        .catch(err => {
          alert("the request failed!");
          $("#page-loader").hide();
        });
    },
    getCourse(courseid){
        axios.post('getcourse', {
        courseid: courseid
        })
        .then(res => {
            console.log(res.data)
            this.coursedetails = res.data;
        })
        .catch(err => {
            console.log(err)
        })
    },
    fetchUserCourses() {
      axios
        .post("/getusercourses", {
          userid: this.userid
        })
        .then(res => {
          console.log(res.data)
          this.courses = res.data
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
                console.log(res.data)
                this.userid = res.data;
                this.fetchUserCourses();
                })
                .catch(err => {
                alert(err);
                });
            },
        
        },
        created() {
            this.isLoggedIn();
            this.getCourse();
        },
    }
</script>


<style>
.align-loader-center{
    display:flex;
    justify-content:center;
    align-items:center
}
@keyframes fadein {
    from { opacity: 0; }
    to   { opacity: 1; }
}

/* Firefox < 16 */
@-moz-keyframes fadein {
    from { opacity: 0; }
    to   { opacity: 1; }
}

/* Safari, Chrome and Opera > 12.1 */
@-webkit-keyframes fadein {
    from { opacity: 0; }
    to   { opacity: 1; }
}

/* Internet Explorer */
@-ms-keyframes fadein {
    from { opacity: 0; }
    to   { opacity: 1; }
}

.coursedetails{
     -webkit-animation: fadein 2s; /* Safari, Chrome and Opera > 12.1 */
       -moz-animation: fadein 2s; /* Firefox < 16 */
        -ms-animation: fadein 2s; /* Internet Explorer */
         -o-animation: fadein 2s; /* Opera < 12.1 */
            animation: fadein 2s;
}
</style>