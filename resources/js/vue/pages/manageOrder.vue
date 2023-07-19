<template>
<navBar/>
<userBill/>
<footerBar/>
</template>

<script>
import navBar from '../components/navBar.vue';
import footerBar from '../components/footerBar.vue';
import userBill from '../components/userBill.vue';
export default{
    components:{
        navBar,
        footerBar,
        userBill
    },
    // created:{

    // },
    // methods(){

    // }
}
</script>