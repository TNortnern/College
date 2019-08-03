<template>
  <div>
    <loginmodal v-if="loginModalOpen" @closeModal="loginModalOpen = false"></loginmodal>
    <div class="navbar-shell">
        <div class="school-logo"></div>
        <div class="navbar-subshell">
          <div class="nav-top">
              <p class="school-name">University of Greater Ontario</p>
              <div class="nav-top-side">
                <div class="login-button button" @click="loginModalOpen = true">Login</div>
                <!-- <router-link to="/login"></router-link> -->
                <input type="text" v-if="instructorCredentials" class="search-bar" placeholder="search">
              </div>
          </div>
          <div class="nav-buttons" v-if="instructorCredentials">
              <dropdown :dropdownObject='academicsDropdown'></dropdown>
              <dropdown :dropdownObject='admissionsDropdown'></dropdown>
              <dropdown :dropdownObject='studentLifeDropdown'></dropdown>
              <dropdown :dropdownObject='researchDropdown'></dropdown>
              <dropdown :dropdownObject='alumniDropdown'></dropdown>
              <dropdown :dropdownObject='athleticsDropdown'></dropdown>
          </div>
        </div>
    </div>
  </div>
</template>

<script>
import './../../sass/navbar.scss'
import dropdown from './Dropdown'
import loginmodal from './LoginModal'
export default {
  name: "navbar",
  components: {
      dropdown,
      loginmodal
  },
  data: function() {
    return {
      loginModalOpen: false,
      instructorCredentials: false,
      academicsDropdown: {
        mainButtonClass: "nav-dropdown-main-btn",
        subButtonClass: "nav-dropdown-sub-btn",
        mainButtonName: "Academics",
        buttonNames: [
          { name: "Majors, Degrees, Programs" },
          { name: "Undergraduate Education" },
          { name: "Graduate Education" },
          { name: "Online Education" }
        ]
      },
      admissionsDropdown: {
        mainButtonClass: "nav-dropdown-main-btn",
        subButtonClass: "nav-dropdown-sub-btn",
        mainButtonName: "Admissions",
        buttonNames: [
          { name: "Majors, Degrees, Programs" },
          { name: "Undergraduate Education" },
          { name: "Graduate Education" },
          { name: "Online Education" }
        ]
      },
      studentLifeDropdown: {
        mainButtonClass: "nav-dropdown-main-btn",
        subButtonClass: "nav-dropdown-sub-btn",
        mainButtonName: "Student Life",
        buttonNames: [
          { name: "Majors, Degrees, Programs" },
          { name: "Undergraduate Education" },
          { name: "Graduate Education" },
          { name: "Online Education" }
        ]
      },
      researchDropdown: {
        mainButtonClass: "nav-dropdown-main-btn",
        subButtonClass: "nav-dropdown-sub-btn",
        mainButtonName: "Research",
        buttonNames: [
          { name: "Majors, Degrees, Programs" },
          { name: "Undergraduate Education" },
          { name: "Graduate Education" },
          { name: "Online Education" }
        ]
      },
      alumniDropdown: {
        mainButtonClass: "nav-dropdown-main-btn",
        subButtonClass: "nav-dropdown-sub-btn",
        mainButtonName: "Alumni",
        buttonNames: [
          { name: "Majors, Degrees, Programs" },
          { name: "Undergraduate Education" },
          { name: "Graduate Education" },
          { name: "Online Education" }
        ]
      },
      athleticsDropdown: {
        mainButtonClass: "nav-dropdown-main-btn",
        subButtonClass: "nav-dropdown-sub-btn",
        mainButtonName: "Athletics",
        buttonNames: [
          { name: "Majors, Degrees, Programs" },
          { name: "Undergraduate Education" },
          { name: "Graduate Education" },
          { name: "Online Education" }
        ]
      }
    };
  },
  created() {}
};
</script>