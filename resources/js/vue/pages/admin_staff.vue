<template>
    <topBar />
    <sideBar />
    <manageStaff/>

   
</template>
<script>

import sideBar from '../components/sideBar.vue';
import topBar from '../components/topBar.vue';
import manageStaff from '../components/manageStaff.vue';
export default {
    components: {
        sideBar,
        manageStaff,
        topBar
    },
    methods: {
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