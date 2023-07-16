<template>
    <navBar />
<cartCheckout/>
    <footerBar />
</template>
<script>
import navBar from '../components/navBar.vue';
import footerBar from '../components/footerBar.vue';
import cartCheckout from '../components/cartCheckout.vue';
export default {
    components: {
        navBar,
        footerBar,
        cartCheckout
    }
}
</script>