<template>
    <!-- <div class="header">
    <span id="text1">Miễn phí vận chuyển cho khách hàng mới</span>
  </div> -->
    <div class="navbar">
        <div class="left_user_nav">
            <router-link to="/">
                <div class="charlie-keith">Charlie & Keith</div>
            </router-link>
            <div class="dropdown">
                <button class="dropbtn">
                    <router-link to="/products/shoes">Giày</router-link>
                </button>
                <div class="content-wrapper">
                    <div class="dropdown-content">
                        <div class="right-content">
                            <b>Mua theo danh mục</b>
                            <router-link to="/products/shoes" @click="checkboxChanged(1)">Giày
                                xăng
                                đan</router-link>
                                <router-link to="/products/shoes" @click="checkboxChanged(2)">Giày cao gót</router-link>
                                <router-link to="/products/shoes" @click="checkboxChanged(3)">Giày đế bệt</router-link>
                        </div>
                        <div class="left-content">
                            <div class="image-with-text">
                                <img src="https://www.charleskeith.vn/on/demandware.static/-/Library-Sites-CharlesKeithVN/default/dw62befb9f/images/megamenu/2023/CharlesKeith_MegaMenu-Shoes_week20-1-500x667.jpg"
                                    alt="Image 1" />
                                <router-link to="/products/shoes" @click="checkboxChanged(3)">GIÀY ĐẾ BỆT</router-link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dropdown">
                <button class="dropbtn">
                    <router-link to="/products/bags">Túi</router-link>
                </button>
                <div class="dropdown-content">
                    <div class="right-content">
                        <b>Mua theo danh mục</b>
                        <router-link to="/products/bags" @click="checkboxChanged(4)">Túi clutch</router-link>
                        <router-link to="/products/bags" @click="checkboxChanged(5)">Túi đeo chéo</router-link>
                        <router-link to="/products/bags" @click="checkboxChanged(6)">Túi xách</router-link>
                    </div>
                    <div class="left-content">
                        <div class="image-with-text">
                            <img src="https://www.charleskeith.vn/on/demandware.static/-/Library-Sites-CharlesKeithVN/default/dwac3ec366/images/megamenu/2023/CharlesKeith_MegaMenu-Bags_week22-1-500x667.jpg"
                                alt="Image 1" />
                            <router-link to="/products/bags" @click="checkboxChanged(5)">TÚI ĐEO CHÉO</router-link>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dropdown">
                <button class="dropbtn">
                    <router-link to="/products/wallets">Ví</router-link>
                </button>
                <div class="dropdown-content">
                    <div class="right-content">
                        <b>Mua theo danh mục</b>
                        <router-link to="/products/wallets" @click="checkboxChanged(7)">Ví đựng thẻ</router-link>
                        <router-link to="/products/wallets" @click="checkboxChanged(8)">Ví dài</router-link>
                    </div>
                    <div class="left-content">
                        <div class="image-with-text">
                            <img src="https://www.charleskeith.vn/on/demandware.static/-/Library-Sites-CharlesKeithVN/default/dw2c1cea2f/images/megamenu/2023/CharlesKeith_MegaMenu-Wallets_week14-1-500x667.jpg"
                                alt="Image 1" />
                            <router-link to="/products/wallets" @click="checkboxChanged(7)">VÍ ĐỰNG THẺ</router-link>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dropdown">
                <button class="dropbtn">
                    <router-link to="/products/sunglasses">Kính Mắt</router-link>
                </button>
                <div class="dropdown-content">
                    <div class="right-content">
                        <b>Mua theo danh mục</b>
                        <router-link to="/products/sunglasses" @click="checkboxChanged(10)">Kính gọng tròn</router-link>
                        <router-link to="/products/sunglasses" @click="checkboxChanged(9)">Kính gọng vuông</router-link>
                        <router-link to="/products/sunglasses" @click="checkboxChanged(11)">Kính gọng Chữ nhật</router-link>
                    </div>
                    <div class="left-content">
                        <div class="image-with-text">
                            <img src="https://www.charleskeith.vn/on/demandware.static/-/Library-Sites-CharlesKeithVN/default/dw2c1cea2f/images/megamenu/2023/CharlesKeith_MegaMenu-Wallets_week14-1-500x667.jpg"
                                alt="Image 1" />
                            <router-link to="/products/sunglasses" @click="checkboxChanged(11)">KÍNH GỌNG CHỮ NHẬT</router-link>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dropdown">
                <button class="dropbtn">
                    <router-link to="/products/jewellery">Trang Sức</router-link>
                </button>
                <div class="content-wrapper">
                    <div class="dropdown-content">
                        <div class="right-content">
                            <b>Mua theo danh mục</b>
                            <router-link to="/products/jewellery" @click="checkboxChanged(12)">Khuyên tai</router-link>
                            <router-link to="/products/jewellery" @click="checkboxChanged(13)">Nhẫn</router-link>
                            <router-link to="/products/jewellery" @click="checkboxChanged(14)">Vòng tay</router-link>
                        </div>
                        <div class="left-content">
                            <div class="image-with-text">
                                <img src="https://www.charleskeith.vn/on/demandware.static/-/Library-Sites-CharlesKeithVN/default/dw62befb9f/images/megamenu/2023/CharlesKeith_MegaMenu-Shoes_week20-1-500x667.jpg"
                                    alt="Image 1" />
                                <router-link to="/products/jewellery" @click="checkboxChanged(14)">VÒNG  TAY</router-link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="right_user_nav">
            <button class="user-button">
                <a v-if="userSessionExists" href="/api/user/destroy_session">
                    <i class="bx bx-log-out"></i>
                </a>
                <router-link v-if="userSessionExists" to="/user/order">
                    <i class="bx bxs-user"></i>
                </router-link>
                <router-link v-else to="/user/login">
                    <i class="bx bx-user-circle"></i>
                </router-link>
            </button>
            <span>{{ quantity }}</span>
            <button class="user-button">
                <router-link to="/user/cart">
                    <i class="bx bx-shopping-bag"></i>
                </router-link>
            </button>
        </div>
    </div>
</template>
<style scoped>
.navbar {
    box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
    justify-content: space-between;
}

/*
.right_user_nav{
    display: flex;
    align-items: center;
} */
.right_user_nav {
    display: flex;
    align-items: center;
}

.user-button {
    background: none;
    border: none;
    cursor: pointer;
    margin-right: 10px;
}

.user-button:focus {
    outline: none;
}

.user-button i {
    font-size: 24px;
    /* Add any additional styles for the icons */
}
</style>
<script>
export default {
    data() {
        return {
            quantity: 0,
            userSessionExists: false,
        };
    },
    created() {
        this.fetchCartQuantity();
        this.checkUserLogin();
    },
    methods: {
        checkboxChanged(value) {
            this.$emit('checkbox-selected', value);
        },
        fetchCartQuantity() {
            // Make the API call using the selected checkbox value
            axios
                .get(`/api/cart/quantity`)
                .then((response) => {
                    this.quantity = response.data;
                    console.log(this.quantity);
                })
                .catch((error) => {
                    console.error(error);
                });
        },
        checkUserLogin() {
            // Make the API call using the selected checkbox value
            axios.get(`/api/user`).then((response) => {
                console.log(response);
                const responseData = response.data; // The entire response object
                if (responseData.user && Object.keys(responseData.user).length > 0 && response) {
                    this.userSessionExists = true;
                }
                else {
                    // Handle the case when the response has more than one data item
                    console.log("No user login");
                }
            });
        },
    }
};

</script>
