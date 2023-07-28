<template>
  <navBar @checkbox-selected="checkboxSelected"/>
  <div class="container_pro">
    <filterTab @checkbox-selected="checkboxSelected" />
    <div class="banner_box">
      <prodBanner />
      <div class="product">
        <div v-for="product in products" :key="product.id" class="product-display">

          <img :src="`${product.image_link}`" alt="Hình ảnh sản phẩm" class="product-image" />

          <div class="product-info">
            <div class="product-details" @mouseover="toggleElements" @mouseleave="toggleElements">
              <router-link :to="`/product_detail/${product.id}`">
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
    </div>
  </div>
  <footerBar />
</template>
  
<script>
import navBar from '../components/navBar.vue';
import footerBar from '../components/footerBar.vue';
import filterTab from '../components/filterTab.vue';
import prodBanner from '../components/prodBanner.vue';
import axios from 'axios';

export default {
  components: {
    navBar,
    filterTab,
    prodBanner,
    footerBar
  },
  data() {
    return {
      products: [], // Initialize an empty array
      checkboxValue: null,
    };
  },
  created() {
    this.$watch(
      () => this.$route.params,
      () => {
        this.filterType();
      },
    );
    this.filterType();
  },
  methods: {
    checkboxSelected(value) {
      this.checkboxValue = value;
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
      if (this.checkboxValue !== null) {
        // Make the API call using the selected checkbox value
        if (this.checkboxValue == 999 || this.checkboxValue === '999') {
          this.filterType();
        }else{
        axios
          .get(`/api/products/category/${this.checkboxValue}`)
          .then(response => {
            this.products = response.data;
          })
          .catch(error => {
            console.error(error);
          });
        }
      }else{
        console.log()
      }
    }

    


  },
  watch: {
    checkboxValue: {
      handler() {
        this.fetchFilteredProducts(); // Call the API when checkboxValue changes
      },
      immediate: true, // Call the API on initial load as well
    },
  },
};
</script>
  

  