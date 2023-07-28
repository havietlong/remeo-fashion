<template>
<navBar/>
<userbill/>
<footerBar/>
</template>

<script>
import navBar from '../components/navBar.vue';
import footerBar from '../components/footerBar.vue';
import userbill from '../components/userbill.vue';
export default{
    components:{
        navBar,
        footerBar,
        userbill
    },
    // created:{

    // },
    // methods(){

    // }
}
</script>