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
          <tr v-for="category in categoryOptions" :key="category">
            <td>
              <label class="checkbox-label">
                <input type="checkbox" v-model="categoryFilter" :value="category" />
                {{ category }}
                <span class="checkmark"></span>
              </label>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- Filter by size -->
    <br />
    <div class="table-wrapper">
      <table class="filter-table">
        <thead>
          <tr>
            <th>Kích thước</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="size in sizeOptions" :key="size">
            <td>
              <label class="checkbox-label">
                <input type="checkbox" v-model="sizeFilter" :value="size" />
                {{ size }}
                <span class="checkmark"></span>
              </label>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
import { useRoute } from "vue-router";

export default {
  name: "FilterTab",
  setup() {
    const route = useRoute();
    const currentRouteName = route.name;
    let categoryOptions = [];
    let sizeOptions = [];
    const categoryFilter = [];
    const sizeFilter = [];

    return { currentRouteName, categoryOptions, sizeOptions, categoryFilter, sizeFilter };
  },
  watch: {
    currentRouteName: {
      immediate: true,
      handler(newRoute, oldRoute) {
        // Update categoryOptions and sizeOptions based on the current route
        if (newRoute === "shoes") {
          this.categoryOptions = ["Giày xăng đan", "Giày cao gót", "Giày đế bệt"];
          this.sizeOptions = ["36", "37", "38", "39"];
        } else if (newRoute === "bags") {
          this.categoryOptions = ["Túi xách nhỏ", "Túi xách to", "Túi đeo chéo"];
          this.sizeOptions = ["S", "M", "L", "XL"];
        }

        // Reset the filters
        this.categoryFilter = [];
        this.sizeFilter = [];
      },
    },
  },
};
</script>
