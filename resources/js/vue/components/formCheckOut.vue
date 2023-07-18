<template>
    <div></div> <!-- Placeholder element, can be empty or any other non-visible element -->
</template>
  
<script>
import axios from 'axios';

export default {
    mounted() {
        this.processFormData();
    },
    methods: {
        processFormData() {
            // VALIDATE BANK INFO (NOT WORK)
            // const fullName = this.$route.query['full-name'];
            // const creditCard = this.$route.query['credit-card'];
            // const expirationDate = this.$route.query['expiration-date'];
            // const cvv = this.$route.query['cvv'];

            //PASS INVOICE
            const productQuantity = this.$route.query['productQuantity'];
            const productID = this.$route.query['productID'];
            const productPrice = this.$route.query['productPrice'];
            const productTotalQuantityPrice = this.$route.query['productTotalPrice'];
            this.passToDB(productQuantity,productID,productPrice,productTotalQuantityPrice);
        },
        passToDB(productQuantity,productID,productPrice,productTotalQuantityPrice){
            console.log(productQuantity);
            console.log(productID);
            console.log(productPrice);
            console.log(productTotalQuantityPrice);
            axios
				.post(`/api/inVoice/add`, { productQuantity,productID,productPrice,productTotalQuantityPrice })
				.catch(error => {
					console.error(error);
				});
        }
    },
};
</script>
  