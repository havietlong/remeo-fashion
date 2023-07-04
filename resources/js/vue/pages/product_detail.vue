<template>
     <navBar />
    <div class="prod_detail_container">
       
        <div class="row">
            <product_slider />
            <product_detail />
        </div>
        <div class="interaction">
            <detail_comments />
        </div>
    </div>
    <footerBar />
</template>
<script>
import detail_comments from '../components/detail_comments.vue';
import footerBar from '../components/footerBar.vue';
import product_slider from '../components/product_slider.vue';
import product_detail from '../components/product_detail.vue';
import navBar from '../components/navBar.vue';
export default {
    components: {
        navBar,
        detail_comments,
        product_slider,
        product_detail,
        footerBar
    }
}
</script>
