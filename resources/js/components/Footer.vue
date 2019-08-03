<template>
    <div class="footer-shell">
        <div class="link-group">
            <p class="footer-text">&copy; 2019 University of Greater Ontario</p>
            <a class="footer-link" href="javascript:void(0);">Terms</a> 
            <a class="footer-link" href="javascript:void(0);">Contact</a> 
        </div>
        <div class="link-group right">
            <a class="footer-link right" href="javascript:void(0);">accreditation</a> 
            <a class="footer-link right" href="javascript:void(0);">Privacy Policy</a> 
            <a class="footer-link right" href="javascript:void(0);">Security</a> 
        </div>
    </div>
</template>

<script>
    import './../../sass/footer.scss'
    
    export default {
        name: "globalFooter",
        mounted() {
           
            console.log($("meta[name=login-status]").attr("content"));
        }
    }
</script>