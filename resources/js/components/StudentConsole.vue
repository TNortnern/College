<template>
    <div class="console">
        <navbar></navbar>
        <div class="console-background"></div>
    </div>
</template>

<script>
    import './../../sass/console.scss'
    import navbar from './Navbar'
    
        export default {
        components: {
            navbar,
        },
        mounted() {
           
            console.log($("meta[name=login-status]").attr("content"));
        }
    }
</script>
