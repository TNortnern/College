<template>
    <div class="console">
        <instructorNavbar :profileData='userid'></instructorNavbar>
        <div class="console-background"></div>
    </div>
</template>

<script>
    import './../../sass/console.scss'
    import instructorNavbar from './InstructorNavbar'
    
        export default {
        components: {
            instructorNavbar,
        },
        data: function() {
            return {
                userid: window.sessionStorage.userId,
            }
        },
        mounted() {
           
            console.log($("meta[name=login-status]").attr("content"));
        }
    }
</script>