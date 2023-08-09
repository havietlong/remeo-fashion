<template>
    <navBar></navBar>
    <div class="banner">
        <img id="banner-image"
            src="https://www.charleskeith.com/on/demandware.static/-/Library-Sites-CharlesKeith/default/dw5db55de6/images/homepage/2023/charles-keith-home-s-canvas-capsule-week-29-1920x700.jpg"
            alt="Banner">
    </div>
    <div class="image-container">
        <div class="sub-image">
            <img src="https://www.charleskeith.vn/on/demandware.static/-/Library-Sites-CharlesKeithVN/default/dwc2e22cbe/images/homepage/2023/CharlesKeith_Home_A1_week22-1000x1333.jpg"
                alt="Sub Image 1">
            <div class="text-container">
                <b>Sản phẩm mới</b>
                <p>Nổi bật với những đôi giày, túi xách và phụ kiện mới nhất của chúng tôi</p>
                <br>
                <a href="#">SHOP NOW</a>
            </div>
        </div>
        <div class="sub-image">
            <img src="https://www.charleskeith.vn/on/demandware.static/-/Library-Sites-CharlesKeithVN/default/dwfbea54cc/images/homepage/2023/CharlesKeith_Home_A2_week22-1000x1333.jpg"
                alt="Sub Image 2">
            <div class="text-container">
                <b>Cập nhật xu hướng: Các thiết kế túi đeo chéo thời thượng</b>
                <p>Tô điểm cho vẻ ngoài của bạn với một chút thanh nhã và tự tin​</p>
                <br>
                <router-link  :to="{ name: 'bags', params: { checkboxValue: 5 } }">SHOP NOW</router-link>
            </div>
        </div>

    </div>
    <categories></categories>
    <div class="image-container">
        <div class="sub-image">
            <img src="https://www.charleskeith.vn/on/demandware.static/-/Library-Sites-CharlesKeithVN/default/dw2df886c6/images/homepage/2023/2023-L2-CK2-20770587-49-2.jpg"
                alt="Sub Image 1">
            <div class="text-container">
                <b>Những thiết kế túi chần bông vượt thời gian</b>
                <p>Những thiết kế túi có lớp lót êm ái và bồng bềnh, đầy thanh lịch này sẽ luôn hợp thời</p>
                <br>
                <a href="tui.html">SHOP NOW</a>
            </div>
        </div>
        <div class="sub-image">
            <img src="https://www.charleskeith.vn/on/demandware.static/-/Library-Sites-CharlesKeithVN/default/dwc009c996/images/homepage/2023/CharlesKeith_Home_B2_week21-1000x1000.jpg"
                alt="Sub Image 2">
            <div class="text-container">
                <b>Mặc gì đi vũ hội</b>
                <p>Biến nó thành một đêm đáng nhớ với đôi giày cao gót nổi bật này​</p>
                <br>
                <a href="giay.html">SHOP NOW</a>
            </div>
        </div>
    </div>
    <newProducts></newProducts>
    <footerBar></footerBar>
</template>
<script>
import categories from '../components/categories.vue';
import footerBar from '../components/footerBar.vue';
import newProducts from '../components/newProducts.vue';
import navBar from '../components/navBar.vue';
export default {
    components: {
        navBar,
        categories,
        newProducts,
        footerBar
    },
    methods: {
        checkboxChanged(value) {
            this.$emit('checkbox-selected', value);
        },
    }
}
</script>
