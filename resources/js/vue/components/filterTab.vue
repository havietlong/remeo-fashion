<template>
  <div class="container" >
    <!-- Filter by category -->
    <div class="table-wrapper">
      <table class="filter-table">
        <thead>
          <tr>
            <th>Danh mục</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              <label class="checkbox-label">
                <input type="radio" name="option" @change="checkboxChanged(999)" />
                Tất Cả
              </label>
            </td>
          </tr>
          <tr v-for="category in categories" :key="category">
            <td>
              <label class="checkbox-label">
                <input type="radio" name="option" @change="checkboxChanged(category.id)" />
                {{ category.name }}
              </label>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

   
  </div>
</template>

<script>
import axios from 'axios';
export default {
  data() {
    return {
      categories: [], // Declare and initialize the categories array
    };
  },
  methods: {
    checkboxChanged(value) {
      this.$emit('checkbox-selected', value);
    },
    filterType() {
      const url = window.location.href;
      const parts = url.split("/");
      this.path = parts[parts.length - 1];
      const product_type = this.path;
      let parent_id = '';

      switch (product_type) {
        case 'shoes':
          parent_id = 1;
          this.fetchCategories(parent_id);
          break;
          case 'bags':
          parent_id = 2;
          this.fetchCategories(parent_id);
          break;
          case 'wallets':
          parent_id = 3;
          this.fetchCategories(parent_id);
          break;
          case 'sunglasses':
          parent_id = 4;
          this.fetchCategories(parent_id);
          break;
          case 'jewellery':
          parent_id = 5;
          this.fetchCategories(parent_id);
          break;
      }
    },
    fetchCategories(parent_id) {
      axios
        .get(`/api/categories/${parent_id}`)
        .then(response => {
          this.categories = response.data; // Assign retrieved data to the products array
        })
        .catch(error => {
          console.error(error);
        });
    }

  },
  created(){
   
    this.$watch(
      ()=> this.$route.params,
      ()=>{
        this.filterType();
      },
    );
    this.filterType();
  }
}
</script>