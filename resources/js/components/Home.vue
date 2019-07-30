<template>
    <div>
        <navbar></navbar>
        <div class="landing-page-shell">
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
        </div>
    </div>
</template>

<script>
    import './../../sass/home.scss'
    import navbar from './Navbar'
    
        export default {
        components: {
            navbar,
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>