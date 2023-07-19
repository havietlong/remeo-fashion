<template>
    <div></div>
    <!-- Placeholder element, can be empty or any other non-visible element -->
</template>

<script>
import axios from "axios";

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
            const user_id = this.$route.query["userID"];
            const total_order = this.$route.query["totalOrder"];
            this.passToOrders(user_id, total_order);
            this.getProductAmount();
        },
        passToOrders(user_id, total_order) {
            console.log("user id:" + user_id);
            console.log("total_order:" + total_order);
            axios
                .post(`/api/inVoice/addOrders`, {
                    user_id,
                    total_order,
                })
                .then((response) => {
                    if (response.data == "Successfully added to orders") {
                        this.getLatestorder();
                        // window.location.href = "/user/successPurchase";
                    }
                })
                .catch((error) => {
                    console.error(error);
                });
        },
        getProductAmount() {
            const parameterNames = Object.keys(this.$route.query);
            const indexes = parameterNames
                .filter((name) => name.includes("_"))
                .map((name) => name.substring(name.lastIndexOf("_") + 1))
                .map(Number)
                .filter((index) => !isNaN(index))
                .sort((a, b) => b - a);

            const highestIndex = indexes[0];
            console.log("the highest index:" + highestIndex);
            this.getLatestorder(highestIndex);
        },
        getLatestorder(highestIndex) {
            axios
                .get(`/api/inVoice/Orders`)
                .then((response) => {
                    const orders = response.data;
                    const latestOrder = orders[0];
                    const order_id = latestOrder.id;
                    console.log("order_id: "+order_id);
                    let i = 0;
                    const totalProduct = highestIndex; // Some value representing the total number of products
                    for (i = 0; i <= totalProduct; i++) {
                        const productQuantity =
                            this.$route.query["productQuantity_" + i];
                        const productID = this.$route.query["productID_" + i];
                        const productPrice =
                            this.$route.query["productPrice_" + i];
                        const productTotalQuantityPrice =
                            this.$route.query["productTotalPrice_" + i];

                        this.passToOrder_items(
                            productQuantity,
                            productID,
                            productPrice,
                            productTotalQuantityPrice,
                            order_id
                        );
                    }
                })
                .catch((error) => {
                    console.error(error);
                });
        },
        passToOrder_items(
            productQuantity,
            productID,
            productPrice,
            productTotalQuantityPrice,
            order_id
        ) {
            console.log("productQuantity"+productQuantity);
            console.log(productID);
            console.log(productPrice);
            console.log(productTotalQuantityPrice);
            console.log("order_id is: " + order_id);
            axios
                .post(`/api/inVoice/addOrder_items`, {
                    productQuantity,
                    productID,
                    productPrice,
                    productTotalQuantityPrice,
                    order_id,
                })
                .then((response) => {
                    if (response.data == "Successfully added to order_items") {
                        window.location.href = "/user/successPurchase";
                    }
                })
                .catch((error) => {
                    console.error(error);
                });
        },
    },
};
</script>
