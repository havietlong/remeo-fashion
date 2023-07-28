<template>
    <div class="item-container">
        <div class="item">
            <img
                :src="`${product.image_link}`" />
        </div>
    </div>
</template>
<script>
import axios from 'axios';


export default {
	data() {
		return {
			product:[]
		};
	},
	methods: {
		
	},
	created() {
		
		const productId = this.$route.params.id; // Retrieve the productId from the URL
		
		axios
			.get(`/api/products/details/${productId}`) // Use the retrieved productId in the URL
			.then(response => {
				this.product = response.data;
			})
			.catch(error => {
				console.error(error);
			});
			
	},
};
</script>
  