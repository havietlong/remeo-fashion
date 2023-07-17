<template>
	<div class="detail_total">
		<div class="product-dtl">
			<div class="product-info">
				<div class="product-name">{{ product.name }}</div>
				<div class="product-price-discount">
					<span>{{ product.price }}</span>
				</div>
			</div>
			<p>{{ product.description }}</p>
			<div class="row">
				<div class="col-md-6">
					<label for="size">Kích cỡ</label>
					<select id="size" name="size" class="form-control">
						<option v-for="size in product.sizes" :key="size">{{ size }}</option>
					</select>
				</div>
			</div>
			<div class="product-count">
				<label for="size">Số lượng</label>
				<form action="#" class="display-flex">
					<div class="qtyminus" @click="decrementQty">-</div>
					<input type="number" name="quantity" v-model.number="quantity" >
					<div class="qtyplus" @click="incrementQty">+</div>
				</form>
				<button @click="addToCart(product)" class="round-black-btn">Thêm vào giỏ hàng</button>
			</div>
		</div>
	</div>
</template>  
  
<script>
import axios from 'axios';
import detail_comments from '../components/detail_comments.vue';

export default {
	components: {
		detail_comments
	},
	data() {
		return {
			cartItems: [],
			product: {},
			quantity:1
		};
	},
	methods: {
		addToCart(item) {
			console.log('click');
			axios
				.post(`/api/cart/add`, { item, quantity: this.quantity })
				.then(response => {
					this.cartItems = response.data.cartItems;
					window.location.reload();
				})
				.catch(error => {
					console.error(error);
				});
		},
		decrementQty() {
			if (this.quantity > 0) {
				console.log(this.quantity);
				this.quantity--;
			}
		},
		incrementQty() {
			this.quantity++;
		}
	},
	created() {
		
		axios
			.get('/api/cart')
			.then(response => {
				this.cartItems = response.data.cartItems;
			})
			.catch(error => {
				console.error(error);
			});

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
  