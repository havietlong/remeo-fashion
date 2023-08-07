<template>
  <div class="mngForm_container">
    <div class="productsTab">
     <h1>
      Quản lí hóa đơn
     </h1>
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Khách hàng</th>
            <th>Giá trị</th>
          </tr>
        </thead>
        <tbody v-for="product in products" :key="product.id">
          <tr @click="loadDataOrder_items(product.id)">
            <td>{{ product.id }}</td>
            <td>{{ product.name }}</td>
            <td>{{ product.order_price }}</td>
          </tr>
          <tr>
            <td colspan="4">
              <div class="panel">
                <!-- Content of the panel goes here -->
                <table>
                  <thead>
                    <tr>
                      <td>Prod. Image</td>
                      <td>Name</td>
                      <td>Quantity</td>
                      <td>Quantity price</td>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="product in Order_items" :key="product.id">
                      <td>Prod. Image</td>
                      <td>{{ product.name }}</td>
                      <td>{{ product.quantity }}</td>
                      <td>{{ product.product_quantity_price }}</td>
                    </tr>
                  </tbody>
                </table>
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
      Order_items: []
    };
  },
  mounted() {
    this.fetchOrders();
    $(".productsTab").on("click", "tbody tr", function () {
      var panel = $(this).next("tr").find(".panel");
      panel.slideToggle("slow");
    });
    // this.loadDataOrder_items(); // Make sure you call this method when needed
  },
  methods: {
    
    toggleDetails(productId) {
      // If the clicked row's product is already selected, deselect it
      if (this.selectedProductId === productId) {
        this.selectedProductId = null;
      } else {
        // Otherwise, set the clicked row's product ID as the selectedProductId
        this.selectedProductId = productId;
      }
    },
    fetchOrders() {
      axios
        .get("/api/inVoice/Order")
        .then((response) => {
          console.log(response)
          // Create a new array of products with an additional "order_id" property
          this.products = response.data;
        })
        .catch((error) => {
          console.error(error);
        });
    },
    loadDataOrder_items(order_id) {
      console.log("order_id: " + order_id);
      axios
        .get(`/api/inVoice/Order_items`, {
          params: {
            order_id: order_id,
          },
        })
        .then((response) => {
          this.Order_items = response.data;
        });
    },
    approveOrders(order_id) {
      axios
        .put(`/api/staff/verify/${order_id}`)
        .then((response) => {
          console.log(response);
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
  left:20px;
  top:30px;
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
