<template>
    <div class="modal-surrounding">
        <div class="modal-container">
            <div class="modal-sidebar-container">
                <div class="modal-close-button" @click='closeModal()'>X</div>
                <div class="modal-sidebar">
                    <input type="text" class="modal-input" placeholder="email">
                    <input type="password" class="modal-input" placeholder="password">
                    <div class="button">Login</div>
                </div>
            </div>
            <div class="modal-description">
                <p>Campus<br>Login</p>
            </div>
        </div>
    </div>
</template>

 <script>
import './../../sass/login-modal.scss'
export default {
   name: 'login-modal',
  methods: {
      closeModal() {
          this.$emit("closeModal", true)
      }
  },
  created() {}
};
</script> 