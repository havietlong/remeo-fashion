<template>
  <div class="mngForm_container">
    <div class="productsTab">
      <h1>Quản lí nhân viên</h1>
      <label style="cursor: pointer;" @click="createNewEmployee()">create new</label>
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th colspan="2">Tên</th>
            <th>Lệnh</th>
          </tr>
        </thead>
        <tbody v-for="product in products" :key="product.id">
          <tr>
            <td>{{ product.id }}</td>
            <td>{{ product.name }}</td>
            <td>{{ product.order_price }}</td>
            <td>
              
              <button @click="deleteStaff(product.id)">Xóa</button>
              
            </td>
          </tr>
          <tr>
            <td colspan="4">
              <div class="panel">
                <form @submit.prevent="sendForm(product)">
                  <!-- Form content goes here -->
                  <label for="name">Tên:</label>
                  <input type="text" id="name" name="name" v-model="productFormData.name"
                    :placeholder="`${product.name}`">

                  <label for="name">Email:</label>
                  <input type="text" id="email" name="email" v-model="productFormData.email"
                    :placeholder="`${product.email}`">

                    <label for="name">Mật khẩu:</label>
                  <input type="text" id="password" name="password" v-model="productFormData.password"
                    :placeholder="`${product.password}`">

                  <label for="product_type_id">Vai trò:</label>
                  <select @change="loadCategory" v-model="productFormData.role" id="role_id"
                    name="role_id">
                    <option value="1">Khách hàng</option>
                    <option value="2">Nhân viên</option>
                    <option value="3">Admin</option>
                  </select>

                  <button type="submit">Lưu</button>
            
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
    this.fetchStaffs();
    $(".productsTab").on("click", "tbody tr", function () {
      var panel = $(this).next("tr").find(".panel");
      panel.slideToggle("slow");
    });
    // this.loadDataOrder_items(); // Make sure you call this method when needed
  },
  methods: {
    createNewEmployee() {
            axios
                .post(`/api/admin/add`)
                .then((response) => {
                    if (response) {
                      window.location.reload();
                    }
                })
                .catch((error) => {
                    console.error(error);
                });
        },
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
    fetchStaffs() {
      axios
        .get("/api/staff")
        .then((response) => {
          console.log(response);
          // Create a new array of products with an additional "order_id" property
          this.products = response.data;
        })
        .catch((error) => {
          console.error(error);
        });
    },
    deleteStaff(product_id) {
      axios
        .delete(`/api/admin/delete/${product_id}`)
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
      const staffData = {
        name: this.productFormData.name,
        email: this.productFormData.email,
        password: this.productFormData.password,
        role_id: this.productFormData.role,
      };
      console.log(staffData);
      
      axios
        .put(`/api/admin/modify/${product.id}`,staffData)
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
