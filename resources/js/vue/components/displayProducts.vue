<template>
    <div class="product">
        <div v-for="product in products" :key="product.id" class="product-display">

          <img :src="`${product.image_link}`" alt="Hình ảnh sản phẩm" class="product-image" />

          <div class="product-info">
            <div class="product-details" @mouseover="toggleElements" @mouseleave="toggleElements">
              <router-link style="text-decoration: none;color: black; font-weight: lighter;" :to="`/product_detail/${product.id}`">
                <h3>{{ product.name }}</h3>
              </router-link>
              <p>{{ product.price }}</p>
            </div>
            <div class="product-sizes" @mouseover="toggleElements" @mouseleave="toggleElements">
              <button class="add-to-cart-button" @click="addToCart(product)">Thêm vào giỏ hàng</button>
            </div>
          </div>
        </div>
      </div>
</template>
<script>
import filtertab from './filtertab.vue';
export default {
    
    components:{
        filtertab
    },
  data() {
    return {
      products: [], // Initialize an empty array
      isShow:false,
      props: ['checkboxValue'],
    };
  },
  created() {
    
    this.checkboxSelected(),
    this.$watch(
      () => this.$route.params,
      () => {
        this.checkboxSelected();
      },
    );
  },
  methods: {
    checkboxSelected(value) {
      this.checkboxValue = value
      if (this.checkboxValue == null) {
        this.checkboxValue = this.$route.params.checkboxValue;
        console.log("not null actually "+this.checkboxValue)
        this.fetchFilteredProducts();
        if(this.checkboxValue == null){
            console.log("null");
            this.filterType();
        }
      } else {
        console.log("not null");
        this.fetchFilteredProducts();
      }
    },
    filterType() {
      const url = window.location.href;
      const parts = url.split("/");
      this.path = parts[parts.length - 1];
      const product_type = this.path;
      let product_type_id = '';

      switch (product_type) {
        case 'shoes':
          product_type_id = 1;
          this.fetchProducts(product_type_id);
          break;
        case 'bags':
          product_type_id = 2;
          this.fetchProducts(product_type_id);
          break;
        case 'wallets':
          product_type_id = 3;
          this.fetchProducts(product_type_id);
          break;
        case 'sunglasses':
          product_type_id = 4;
          this.fetchProducts(product_type_id);
          break;
        case 'jewellery':
          product_type_id = 5;
          this.fetchProducts(product_type_id);
          break;
      }
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
    // Add a new method to make the API call
    fetchFilteredProducts() {
        console.log (this.checkboxValue);
      // Make the API call using the selected checkbox value
      if (this.checkboxValue == 999 || this.checkboxValue === '999') {
        this.filterType();
      } else {
        axios
          .get(`/api/products/category/${this.checkboxValue}`)
          .then(response => {
            this.products = response.data;
          })
          .catch(error => {
            console.error(error);
          });
      }

    }




  },
  
};
</script>
  

  
