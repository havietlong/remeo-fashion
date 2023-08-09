<template>
  <navBar/>
  <div class="container_pro">
    <filterTab @checkbox-selected="updateCheckboxValue"/>
    <div class="banner_box">
      <prodBanner />
      <displayProducts  ref="disPlayProdRef"/>
    </div>
  </div>
  <footerBar />
</template>
  
<script>
import navBar from '../components/navBar.vue';
import footerBar from '../components/footerBar.vue';
import filterTab from '../components/filtertab.vue';
import prodBanner from '../components/prodBanner.vue';
import index from './index.vue';
import displayProducts from '../components/displayProducts.vue';

export default {
  components: {
    navBar,
    filterTab,
    prodBanner,
    footerBar,
    displayProducts,
    index
  },
  data() {
    return {
      checkboxValue:Int16Array,
    };
  },
  created(){
    this.updateCheckboxValue
  },
  methods:{
    updateCheckboxValue(value) {
      this.checkboxValue = value;
      console.log( this.checkboxValue );
      this.$refs.disPlayProdRef.checkboxSelected(value);
      this.$refs.disPlayProdRef.fetchFilteredProducts();
    },
  }
};
</script>
  

  