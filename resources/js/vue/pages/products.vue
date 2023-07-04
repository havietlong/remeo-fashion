<template>
  <navBar />
  <div class="container_pro">
    <filterTab />
    <div class="banner_box">
      <prodBanner />
      <div class="product">
        <div v-for="product in products" :key="product.id" class="product-display">

          <img
            src="https://www.charleskeith.vn/dw/image/v2/BCWJ_PRD/on/demandware.static/-/Sites-vn-products/default/dw3939158a/images/hi-res/2022-L6-CK1-61720118-41-1.jpg?sw=1152&sh=1536"
            alt="Hình ảnh sản phẩm" class="product-image" />

          <div class="product-info">
            <div class="product-details" @mouseover="toggleElements" @mouseleave="toggleElements">
              <router-link :to="`/product_detail/${product.id}`">
                <h3>{{ product.name }}</h3>
              </router-link>
              <p>{{ product.price }}</p>
            </div>
            <div class="product-sizes" @mouseover="toggleElements" @mouseleave="toggleElements">
              <div class="size-dropdown">
                <select id="size-select">
                  <option value="36">36</option>
                  <option value="37">37</option>
                  <option value="38">38</option>
                  <option value="39">39</option>
                </select>
              </div>
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
      products: [] // Initialize an empty array
    };
  },
  created() {
    this.$watch(
      ()=> this.$route.params,
      ()=>{
        this.filterType();
      },
    );
    this.filterType();
  },
  methods: {
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
    }

  }
};
</script>
  

  