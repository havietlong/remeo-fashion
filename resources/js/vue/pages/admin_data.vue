<template>
    <topBar />
    <sideBar />
    <manageData/>

   
</template>
<script>

import sideBar from '../components/sideBar.vue';
import topBar from '../components/topBar.vue';
import manageData from '../components/manageData.vue';
export default {
    components: {
        sideBar,
        manageData,
        topBar
    },
    created(){
        this.checkUserLogin();
    },
    methods: {
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
          
          axios.get(`/api/user/destroy_session`);
          this.$router.push({ name: 'login' });
        }
      });
    },
        fetchProducts(product_type_id) {
            axios
                .get(`/api/products/type/${product_type_id}`)
                .then(response => {
                    this.products = response.data; // Assign retrieved data to the products array
                })
                .catch(error => {
                    console.error(error);
                });
        },
        
    }
}
</script>