<template>
    <!-- <div class="header">
    <span id="text1">Miễn phí vận chuyển cho khách hàng mới</span>
  </div> -->
    <div class="navbar">
        <div class="left_user_nav">
            <div class="charlie-keith">Charlie & Keith</div>
            <div class="dropdown">
                <button class="dropbtn">
                    <router-link to="/products/shoes">Giày</router-link>
                </button>
                <div class="content-wrapper">
                    <div class="dropdown-content">
                        <div class="right-content">
                            <b>Mua theo danh mục</b>
                            <a href="#submenu1">Giày xăng đan</a>
                            <a href="#submenu2">Giày cao gót</a>
                            <a href="#submenu3">Giày đế bệt</a>
                        </div>
                        <div class="left-content">
                            <div class="image-with-text">
                                <img
                                    src="https://www.charleskeith.vn/on/demandware.static/-/Library-Sites-CharlesKeithVN/default/dw62befb9f/images/megamenu/2023/CharlesKeith_MegaMenu-Shoes_week20-1-500x667.jpg"
                                    alt="Image 1"
                                />
                                <p>GIÀY ĐẾ BỆT</p>
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
                        <a href="#submenu1">Túi clutch</a>
                        <a href="#submenu2">Túi đeo chéo</a>
                        <a href="#submenu3">Túi xách</a>
                    </div>
                    <div class="left-content">
                        <div class="image-with-text">
                            <img
                                src="https://www.charleskeith.vn/on/demandware.static/-/Library-Sites-CharlesKeithVN/default/dwac3ec366/images/megamenu/2023/CharlesKeith_MegaMenu-Bags_week22-1-500x667.jpg"
                                alt="Image 1"
                            />
                            <p>TÚI TOTE</p>
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
                        <a href="#submenu1">Ví đựng thẻ</a>
                        <a href="#submenu2">Ví dài</a>
                    </div>
                    <div class="left-content">
                        <div class="image-with-text">
                            <img
                                src="https://www.charleskeith.vn/on/demandware.static/-/Library-Sites-CharlesKeithVN/default/dw2c1cea2f/images/megamenu/2023/CharlesKeith_MegaMenu-Wallets_week14-1-500x667.jpg"
                                alt="Image 1"
                            />
                            <p>VÍ NGẮN</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dropdown">
                <button class="dropbtn">
                    <router-link to="/products/sunglasses"
                        >Kính Mắt</router-link
                    >
                </button>
                <div class="dropdown-content">
                    <div class="right-content">
                        <b>Mua theo danh mục</b>
                        <a href="#submenu1">Kính gọng tròn</a>
                        <a href="#submenu2">Kính gọng vuông</a>
                        <a href="#submenu2">Kính gọng Chữ nhật</a>
                    </div>
                    <div class="left-content">
                        <div class="image-with-text">
                            <img
                                src="https://www.charleskeith.vn/on/demandware.static/-/Library-Sites-CharlesKeithVN/default/dw2c1cea2f/images/megamenu/2023/CharlesKeith_MegaMenu-Wallets_week14-1-500x667.jpg"
                                alt="Image 1"
                            />
                            <p>VÍ NGẮN</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dropdown">
                <button class="dropbtn">
                    <router-link to="/products/jewellery"
                        >Trang Sức</router-link
                    >
                </button>
                <div class="content-wrapper">
                    <div class="dropdown-content">
                        <div class="right-content">
                            <b>Mua theo danh mục</b>
                            <a href="#submenu1">Khuyên tai</a>
                            <a href="#submenu2">Nhẫn</a>
                            <a href="#submenu3">Vòng tay</a>
                        </div>
                        <div class="left-content">
                            <div class="image-with-text">
                                <img
                                    src="https://www.charleskeith.vn/on/demandware.static/-/Library-Sites-CharlesKeithVN/default/dw62befb9f/images/megamenu/2023/CharlesKeith_MegaMenu-Shoes_week20-1-500x667.jpg"
                                    alt="Image 1"
                                />
                                <p>GIÀY ĐẾ BỆT</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="right_user_nav">
            <button class="user-button">
                <router-link v-if="userSessionExists" to="/user/profile">
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
            userSessionExists: false
        };
    },
    created() {
        this.fetchCartQuantity();
        this.checkUserLogin();
    },
    methods: {
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
            axios
                .get(`/api/user`)
                .then((response) => {
                    this.userSessionExists = true;
                })
                .catch((error) => {
                    console.error(error);
                });
        },
    },
};
</script>
