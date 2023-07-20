<template>
    <div class="productsTab">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tình trạng</th>
                    <th>Giá trị</th>
                </tr>
            </thead>
            <tbody v-for="product in products">
                <tr @click="loadDataOrder_items(product.id)">
                    <td>{{ product.id }}</td>
                    <td>Đang xử lí</td>
                    <td>Đang xử lí</td>
                </tr>
                <tr>
                    <td colspan="3">
                        <div class="panel">
                            <!-- Content of the panel goes here -->
                            <table>
                                <thead>
                                    <tr>
                                        <td>Prod. Image</td>
                                        <td>Name</td>
                                        <td>Quantity</td>
                                        <td>Quantity price</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="product in Order_items">
                                        <td>Prod. Image</td>
                                        <td>{{ product.name }}</td>
                                        <td>{{ product.quantity }}</td>
                                        <td>{{ product.product_quantity_price }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<style scoped>
.productsTab .panel {
    display: none;
}

table {
    box-shadow: 0px 10px 50px rgba(0, 0, 0, 0.1);
}

.productsTab {
    padding: 50px;
    border-radius: 15px;
}

.productsTab table {
    width: 100%;
    border-collapse: collapse;
}

.productsTab th,
.productsTab td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

.productsTab th {
    background-color: #f2f2f2;
    font-weight: bold;
}

.productsTab tr:nth-child(even) {
    background-color: #f9f9f9;
}
</style>
<script>
import $ from "jquery";
export default {
    data() {
        return {
            products: [],
            Order_items: []
        };
    },
    created() {
        this.fetchUserID();
    },
    mounted() {
        $(".productsTab").on("click", "tbody tr", function () {
            var panel = $(this).next("tr").find(".panel");
            panel.slideToggle("slow");
        });
    },
    methods: {
        fetchOrders(user_id) {
            console.log("user_id: " + user_id);
            axios
                .get("/api/inVoice/Order", {
                    params: {
                        user_id: user_id,
                    },
                })
                .then((response) => {
                    console.log(response);
                    this.products = response.data; // Assign retrieved data to the products array
                })
                .catch((error) => {
                    console.error(error);
                });
        },
        fetchUserID() {
            // Make the API call using the selected checkbox value
            axios.get(`/api/user`).then((response) => {
                console.log(response);
                const responseData = response.data; // The entire response object
                if (
                    responseData.user &&
                    Object.keys(responseData.user).length > 0
                ) {
                    const user_id = responseData.user.id;
                    this.fetchOrders(user_id);
                } else {
                    // Handle the case when the response has more than one data item
                    console.error("Response contains more than one data item.");
                }
            });
        },
        loadDataOrder_items(order_id) {
            console.log("order_id: " + order_id);
            axios
                .get(`/api/inVoice/Order_items`, {
                    params: {
                        order_id: order_id,
                    },
                })
                .then((response) => {
                    this.Order_items=response.data;
                });
        },
    },
};
</script>
