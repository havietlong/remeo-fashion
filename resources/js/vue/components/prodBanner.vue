<template>
  <div class="background-box">
    <h2>{{ categoryTitle }}</h2>
  </div>
</template>
<script>
export default {
  data() {
    return {
      categoryTitle: "Giày nữ", // Default category title
    };
  },
  created() {
    this.$watch(
      () => this.$route.params,
      () => {
        this.displayCatBanner();
      },
    );
  },
  methods: {
    displayCatBanner() {
      const url = window.location.href;
      const parts = url.split("/");
      this.path = parts[parts.length - 1];
      const product_type = this.path;
      

      switch (product_type) {
        case "shoes":
          this.categoryTitle = "Giày nữ"; // Set the category title for shoes
          break;
        case "bags":
          this.categoryTitle = "Túi xách nữ"; // Set the category title for bags
          break;
        case "wallets":
          this.categoryTitle = "Ví nữ"; // Set the category title for wallets
          break;
        case "sunglasses":
          this.categoryTitle = "Kính mát nữ"; // Set the category title for sunglasses
          break;
        case "jewellery":
          this.categoryTitle = "Trang sức nữ"; // Set the category title for jewellery
          break;
        default:
          this.categoryTitle = "Giày nữ"; // Set the default category title
          break;
      }
    }
  }
}
</script>