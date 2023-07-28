<template>
  <div class="mngForm_container">
    <div class="productsTab">
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th colspan="2">Sản phẩm</th>
            <th>Lệnh</th>
          </tr>
        </thead>
        <tbody v-for="product in products" :key="product.id">
          <tr>
            <td>{{ product.id }}</td>
            <td>{{ product.name }}</td>
            <td>{{ product.order_price }}</td>
            <td>
              
              <button @click="deleteProduct(product.id)">Xóa</button>
              
            </td>
          </tr>
          <tr>
            <td colspan="4">
              <div class="panel">
                <form @submit.prevent="sendForm(product)">
                  <!-- Form content goes here -->
                  <label for="name">Tên sản phẩm:</label>
                  <input type="text" id="name" name="name" v-model="productFormData.name"
                    :placeholder="`${product.name}`">

                  <label for="name">Giá sản phẩm:</label>
                  <input type="text" id="price" name="price" v-model="productFormData.price"
                    :placeholder="`${product.price}`">

                  <label for="description">Mô tả:</label>
                  <textarea rows="20" id="description" name="description" v-model="productFormData.description"
                    :placeholder="`${product.description}`"></textarea>

                  <label for="image_link">Link hình ảnh:</label>
                  <input type="text" id="image_link" v-model="productFormData.image_link"
                    :placeholder="`${product.image_link}`" name="image_link">

                  <label for="product_type_id">Loại sản phẩm:</label>
                  <select @change="loadCategory" v-model="productFormData.product_type_id" id="product_type"
                    name="product_type">
                    <option value="1">Shoes</option>
                    <option value="2">Bags</option>
                    <option value="3">Wallets</option>
                    <option value="4">Sunglasses</option>
                    <option value="5">Jewellery</option>
                  </select>

                  <input type="hidden" :name="'product_category_id_dummy_' + product.id"
                    :value="productFormData.product_category_id" />

                  <label for="product_category">Danh mục sản phẩm:</label>
                  <select v-model="productFormData.product_category_id" id="product_category" name="product_category_id">
                    <option v-for="category in categories" :key="category.id" :value="category.id">{{ category.name }}
                    </option>
                  </select>

                  <button type="submit">Lưu</button>
                  <button @click="cancelEdit">Hủy</button>
                </form>

              </div>
            </td>
          </tr>
        </tbody>
      </table>

      <!-- Panel to show product details -->
    </div>
  </div>
</template>

<script>
import $ from "jquery";
export default {
  data() {
    return {
      products: [],
      categories: [],
      selectedProductId: null,
      selectedProductType: null,
      productFormData: {},
    };
  },
  mounted() {
    this.fetchProducts();
    $(".productsTab").on("click", "tbody tr", function () {
      var panel = $(this).next("tr").find(".panel");
      panel.slideToggle("slow");
    });
    // this.loadDataOrder_items(); // Make sure you call this method when needed
  },
  methods: {
    loadCategory() {
      const selectedValue = this.productFormData.product_type_id
      axios
        .get(`/api/categories/${selectedValue}`)
        .then((response) => {
          console.log(response);
          // Create a new array of products with an additional "order_id" property
          this.categories = response.data;
          console.log(response);
        })
        .catch((error) => {
          console.error(error);
        });
    },
    toggleDetails(productId) {
      // If the clicked row's product is already selected, deselect it
      if (this.selectedProductId === productId) {
        this.selectedProductId = null;
      } else {
        // Otherwise, set the clicked row's product ID as the selectedProductId
        this.selectedProductId = productId;
      }
    },
    fetchProducts() {
      axios
        .get("/api/products")
        .then((response) => {
          console.log(response);
          // Create a new array of products with an additional "order_id" property
          this.products = response.data;
        })
        .catch((error) => {
          console.error(error);
        });
    },
    deleteProduct(product_id) {
      axios
        .delete(`/api/staff/delete/${product_id}`)
        .then((response) => {
          console.log(response);
          // Create a new array of products with an additional "order_id" property
          this.products = response.data;
        })
        .catch((error) => {
          console.error(error);
        });
        window.location.reload();
    },
    sendForm(product) {
      // Use the user's input directly from the productFormData object
      const productData = {
        name: this.productFormData.name,
        price: this.productFormData.price,
        description: this.productFormData.description,
        image_link: this.productFormData.image_link,
        product_type_id: this.productFormData.product_type_id,
        product_category_id: this.$el.querySelector(`input[name="product_category_id_dummy_${product.id}"]`).value,
      };
      console.log(productData);
      
      axios
        .put(`/api/staff/modify/${product.id}`, productData)
        .then((response) => {
          console.log(response);
          window.location.reload();
        })
        .catch(error => {
          console.error(error);
        });
    },
  },
  computed: {
    selectedProduct() {
      return this.products.find((product) => product.id === this.selectedProductId);
    },
  },
};
</script>

<style scoped>
form {
  padding: 30px;
  display: flex;
  flex-direction: column;
}

.productsTab .panel {
  display: none;
}

table {
  box-shadow: 0px 10px 50px rgba(0, 0, 0, 0.1);
}

.productsTab {
  padding: 50px;
  border-radius: 15px;
  position: relative;
  left: 20px;
  top: 30px;
}

.productsTab table {
  width: 100%;
  border-collapse: collapse;
}

.productsTab th,
.productsTab td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

.productsTab th {
  background-color: #f2f2f2;
  font-weight: bold;
}

.productsTab tr:nth-child(even) {
  background-color: #f9f9f9;
}
</style>
