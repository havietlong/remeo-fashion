<template>
    <navBar />
    <img src="https://img.freepik.com/free-vector/e-wallet-concept-illustration_114360-7561.jpg?w=740&t=st=1689600731~exp=1689601331~hmac=ddc7073c81c881378650b2a4a41e19f82f445b0125c1c47f2c6f2a01978da8b4">
    <footerBar />
</template>
<script>
import navBar from '../components/navBar.vue';
import footerBar from '../components/footerBar.vue';

export default {
    components: {
        navBar,
        footerBar
 
    }
}
</script>