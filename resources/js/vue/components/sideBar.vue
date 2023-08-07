<template>
  <div class="sideBar_container">
    <transition name="expand">
      <div :class="['sideNav', { 'expanded': isExpanded }]" @mouseenter="expandNav" @mouseleave="collapseNav">
        <div v-if="staffSession == true" class="shop">
          <router-link to="/staff/shop">
            <i class="bx bx-shopping-bag"></i>
          </router-link>
        </div>
        <div v-if="staffSession == true" class="orders">
          <router-link to="/staff/orders">
            <i class="bx bx-receipt"></i>
          </router-link>
        </div>
        <div v-if="adminSession == true" class="staff">
          <router-link to="/admin/staff">
            <i class='bx bxs-user-detail'></i>
          </router-link>
        </div>
        <div v-if="adminSession == true" class="shop">
          <router-link to="/admin/shop">
            <i class="bx bx-shopping-bag"></i>
          </router-link>
        </div>
        <div v-if="adminSession == true" class="orders">
          <router-link to="/admin/orders">
            <i class="bx bx-receipt"></i>
          </router-link>
        </div>
        <div v-if="adminSession == true" class="orders">
          <router-link to="/admin/data">
            <i class='bx bxs-bar-chart-square'></i>
          </router-link>
        </div>
        <div class="logOut">
          <a href="/api/user/destroy_session">
            <i class="bx bx-log-out"></i>
          </a>
        </div>
      </div>
    </transition>
  </div>
</template>

<script>
export default {
  data() {
    return {
      isExpanded: false,
      staffSession: false,
      adminSession: false,
    };
  },
  methods: {
    expandNav() {
      this.isExpanded = true;
    },
    collapseNav() {
      this.isExpanded = false;
    },
    checkUserLogin() {
      // Make the API call using the selected checkbox value
      axios.get(`/api/user`).then((response) => {
        console.log(response);
        const responseData = response.data; // The entire response object
        if (responseData.staff) {
          this.staffSession = true;
          this.adminSession = false;
        } else if (responseData.admin) {
          this.adminSession = true;
          this.staffSession = false;
        } else {
          // Handle the case when the response has more than one data item
          console.error("Response contains more than one data item.");
        }
      });
    },
  },
  created() {
    this.checkUserLogin();
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

.sideNav.expanded {
  width: 200px; /* Width when expanded */
}

.sideNav i {
  padding-top: 20px;
  font-size: 30px;
  transition: font-size 0.3s ease;
}
</style>
