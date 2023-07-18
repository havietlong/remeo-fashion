<template>
    <div class="container_cart">
        <div class="left-section">
            <h2>Giỏ hàng</h2>
            <table class="product-table">
                <thead>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Tên</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Tổng</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(product, index) in products" :key="index">
                        <td>
                            <img class="product-image_cart"
                                src="https://www.charleskeith.vn/dw/image/v2/BCWJ_PRD/on/demandware.static/-/Sites-vn-products/default/dw125e5bcc/images/hi-res/2017-L3-CK6-10840105-01-1.jpg?sw=208&sh=278"
                                alt="Sản phẩm 1">
                        </td>
                        <td>
                            <div class="product-info">
                                <span class="product-image_cart">{{ product.item.name }}</span>

                            </div>
                        </td>
                        <td>{{ product.item.price }}</td>
                        <td>
                            <input type="number" min="1" :value="product.quantity" class="quantity-input"
                                @input="updateQuantity(index, $event.target.value)">

                        </td>
                        <td>{{ calculateTotalPrice(product) }}</td>
                    </tr>
                    <!-- <tr>
                        <td>
                            <img class="product-image_cart"
                                src="https://www.charleskeith.vn/dw/image/v2/BCWJ_PRD/on/demandware.static/-/Sites-vn-products/default/dwe4ce9443/images/hi-res/2022-L6-CK1-80050091-B8-1.jpg?sw=208&sh=278"
                                alt="Sản phẩm 2">
                            <div class="product-info">
                                <span class="product-image_cart">Giày sandals nữ xỏ ngón Strappy Flatform Thong</span>

                            </div>
                        </td>
                        <td>2.200.000đ</td>
                        <td>
                            <input type="number" min="1" value="2" class="quantity-input">
                        </td>
                        <td>2.200.000đ</td>
                    </tr> -->
                </tbody>
            </table>
        </div>
        <div class="right-section">
            <h2>Thanh toán</h2>
            <div class="promo-code">
                <input type="text" placeholder="Nhập mã khuyến mãi" class="promo-input">
                <button class="apply-button">Áp dụng</button>
            </div>
            <form action="checkout" method="get" class="checkOutForm" >
                <div class="fillInCheckOut">
                    <input type="text" style="width:45%" id="full-name" name="full-name" required placeholder="Chủ thẻ"
                        class="promo-input">


                    <input type="text" style="width:36%" id="credit-card" name="credit-card" required
                        placeholder="Thông tin thẻ thanh toán" class="promo-input">

                    <input type="text" id="expiration-date" name="expiration-date" required placeholder="Ngày hết hạn"
                        class="promo-input">

                    <input type="text" id="cvv" name="cvv" required placeholder="Mã CVV" class="promo-input">
                </div>
                <div class="productInCart_checkOut" v-for="(product, index) in products" :key="index" >
                    <input type="text" name="productQuantity" :value="product.quantity" hidden>
                    <input type="text" name="productID" :value="product.item.id" hidden>
                    <input type="text" name="productPrice" :value="product.item.price" hidden>
                    <input type="text" name="productTotalPrice" :value="calculateTotalPrice(product)" hidden>
                </div>

                <button type="submit" class="checkout-button">Tiến hành thanh toán</button>
            </form>

        </div>
    </div>
</template>
<style scoped>
.checkOutForm input {
    margin-right: 10px;
    margin-bottom: 10px;
}

.container_cart {
    display: flex;
    margin-bottom: 2cm;
    margin-top: 1cm;
}

.left-section {
    width: 50%;
    padding-left: 1cm;
    padding-right: 1cm;
}

.product-table {
    border-collapse: collapse;
    width: 100%;
}

.product-table th,
.product-table td {
    padding: 8px;
    text-align: left;
}

.product-table th {
    background-color: #f2f2f2;
}

.product-image_cart {
    /* max-width: 100px; */
    max-height: 100px;
}

.product-info {
    display: flex;
    align-items: center;
}

.product-image_cart {
    margin-right: 8px;
}

.delete-button {
    background-color: #ff0000;
    color: #fff;
    border: none;
    padding: 8px 16px;
    cursor: pointer;
}

.right-section {
    width: 50%;
    padding-left: 1cm;
    padding-right: 1cm;
    /* margin-top: 1.8cm; */
}

.promo-code {
    display: flex;
    align-items: center;
    margin-bottom: 16px;
}

.promo-input {
    font-size: 16px;
    padding: 8px;
    flex-grow: 1;
}

.apply-button {
    background-color: #4caf50;
    color: #fff;
    border: none;
    font-size: 16px;
    padding: 8px;
    margin-left: 8px;
    cursor: pointer;
}

.checkout-button {
    background-color: #008CBA;
    color: #fff;
    border: none;
    padding: 16px 32px;
    cursor: pointer;
}
</style>


<script >
import axios from 'axios';
export default {
    data() {
        return {
            products: []
        }
    },
    created() {
        this.fetchProducts();
    },
    methods: {
        updateQuantity(index, newQuantity) {
            this.products[index].quantity = newQuantity;
        }
        ,
        fetchProducts() {
            axios
                .get(`/api/cart`)
                .then(response => {
                    const cartItems = response.data.cartItems;
                    const products = Object.values(cartItems).map(item => {
                        return {
                            item: item.item,
                            quantity: item.quantity
                        };
                    });
                    this.products = products;
                    console.log(this.products);
                })
                .catch(error => {
                    console.error(error);
                });
        },
        calculateTotalPrice(product) {
            return (product.item.price * product.quantity).toFixed(2); // Calculate the total price
        }
    },
    computed: {
        totalPrice() {
            return this.products.reduce((acc, product) => acc + (product.item.price * product.quantity), 0).toFixed(2);
        }
    }
}
</script>