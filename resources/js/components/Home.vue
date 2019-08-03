<template>
    <div>
        <navbar></navbar>
        <!-- <carousel :carouselData='carouselData'></carousel> -->
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
    </div>
  </div>
</template>

<script>
    import './../../sass/home.scss'
    import navbar from './Navbar'
    import carousel from './Carousel'
    
        export default {
        components: {
            navbar,
            carousel,
        },
        data: function() {
            return {
                carouselData: {
                    carouselImage: [
                        'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2626&q=80',
                        'https://images.unsplash.com/photo-1523240795612-9a054b0db644?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=3900&q=80',
                        'https://images.unsplash.com/photo-1549163986-da279e1f27c7?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2448&q=80'
                    ],
                    carouselText: [
                        'Our University supports the highest graduation percentage in the country at 75%.',
                        'A wealth of tutoring services supply students with everything they need to succeed.',
                        'Set in the heart of Ontarios plains, our campus is over 100 years old (and I daresay aging gracefully)'
                    ]
                }
            }
        },
        mounted() {
           
            console.log($("meta[name=login-status]").attr("content"));
        }
    }
</script>
