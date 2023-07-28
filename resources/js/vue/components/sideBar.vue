<template>
  <div class="sideBar_container">
    <div class="sideNav" @mouseover="expandNav" @mouseleave="collapseNav">
      <div class="shop">
      <router-link to="/admin/shop">
        <i class="bx bx-shopping-bag"></i>
      </router-link>  
      </div>
      <div class="orders">
        <i class="bx bx-receipt"></i>
      </div>
    </div>
  </div>
</template>

<script>
import $ from 'jquery';
export default {
  methods: {
    expandNav() {
      // Use jQuery to set the width of the .sideNav element when hovering
      $(".sideNav").animate({ width: "200px" }, 300);
    },
    collapseNav() {
      // Use jQuery to reset the width of the .sideNav element when leaving the hover
      $(".sideNav").animate({ width: "50px" }, 300);
    },
  },
};
</script>

<style scoped>

.sideNav {
  display: flex;
  flex-direction: column;
  align-items: center;
  padding-top: 40px;
  position: fixed;
  box-shadow: 0px 2px 50px rgba(0, 0, 0, 0.1);
  width: 50px;
  height: 100%;
  transition: width 0.3s ease;
  background-color: white;
  z-index: 5;
}

.sideNav i {
  padding-top: 20px;
  font-size: 30px;
  transition: font-size 0.3s ease;
}
</style>
