<template>
    <div class="container_cart">
        <div class="left-section">
            <h2>Giỏ hàng</h2>
            <table class="product-table">
                <thead>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Tổng</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <img class="product-image_cart"
                                src="https://www.charleskeith.vn/dw/image/v2/BCWJ_PRD/on/demandware.static/-/Sites-vn-products/default/dw125e5bcc/images/hi-res/2017-L3-CK6-10840105-01-1.jpg?sw=208&sh=278"
                                alt="Sản phẩm 1">
                            <div class="product-info">
                                <span class="product-image_cart">Ví cầm tay chữ nhật Quilted</span>

                            </div>
                        </td>
                        <td>1.400.000VND</td>
                        <td>
                            <input type="number" min="1" value="1" class="quantity-input">
                        </td>
                        <td>1.400.000đ</td>
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
            <div class="promo-code">
                <input type="text" placeholder="Nhập mã khuyến mãi" class="promo-input">
                <button class="apply-button">Áp dụng</button>
            </div>
            <button class="checkout-button">Tiến hành thanh toán</button>
        </div>
    </div>
</template>
<style scoped>
.container_cart {
    display: flex;
    margin-bottom: 2cm;
    margin-top: 1cm
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
    margin-top: 1.8cm
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