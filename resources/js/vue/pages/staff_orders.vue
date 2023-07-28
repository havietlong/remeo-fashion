<template>
    <topBar />
    <sideBar />
    <manageProducts style="position: relative;z-index: 0;" />
</template>
<script>
import manageProducts from '../components/manageProducts.vue';
import sideBar from '../components/sideBar.vue';
import topBar from '../components/topBar.vue';
export default {
    components: {
        sideBar,
        manageProducts,
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