<template>
    <div class="product-info-tabs">
      <ul>
        <li>
          <a :class="{ active: activeTab === 'description' }" href="#description" @click="setActiveTab('description')">Thông tin sản phẩm</a>
        </li>
        <li>
          <a :class="{ active: activeTab === 'review' }" ref="reviewTab" href="#review" @click="setActiveTab('review')">Reviews (0)</a>
        </li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane" id="description" :class="{ show: activeTab === 'description' }">
          Sản phẩm này nằm trong bộ sưu tập độc quyền khi mua sắm trực tuyến, bao gồm các thiết kế và màu sắc độc đáo chỉ có tại website CHARLESKEITH.VN
  
          Với màu xanh chanh tươi mát, hoàn hảo cho mùa hè, đôi espadrille thong sandals sẽ thêm điểm nhấn về màu sắc để làm bừng sáng mọi bộ trang phục của bạn. Nổi bật với thiết kế xỏ ngón cổ điển được làm mới bằng cách có thêm một quai bản to, những đôi sandals này rất dễ mang và dễ tạo phối. Đế espadrille không chỉ tăng thêm cảm giác boho-chic cho đôi giày này mà còn giúp tăng chiều cao vừa chắc chắn vừa thoải mái.
        </div>
        <div class="tab-pane" id="review" :class="{ show: activeTab === 'review' }">
          <div class="review-heading">Đánh giá</div>
          <p class="mb-20">Chưa có đánh giá</p>
          <form class="review-form">
            <div class="form-group">
              <label>Đánh giá của bạn</label>
              <div class="reviews-counter">
                <div class="rate">
                  <input type="radio" id="star5" name="rate" value="5" />
                  <label for="star5" title="text">5 stars</label>
                  <input type="radio" id="star4" name="rate" value="4" />
                  <label for="star4" title="text">4 stars</label>
                  <input type="radio" id="star3" name="rate" value="3" />
                  <label for="star3" title="text">3 stars</label>
                  <input type="radio" id="star2" name="rate" value="2" />
                  <label for="star2" title="text">2 stars</label>
                  <input type="radio" id="star1" name="rate" value="1" />
                  <label for="star1" title="text">1 star</label>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label>Bình luận</label>
              <textarea class="form-control" rows="10"></textarea>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <input type="text" name="" class="form-control" placeholder="Tên" />
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <input type="text" name="" class="form-control" placeholder="Email" />
                </div>
              </div>
            </div>
            <button class="round-black-btn">Gửi bình luận</button>
          </form>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        activeTab: 'description',
      };
    },
    methods: {
      setActiveTab(tab) {
        this.activeTab = tab;
      },
    },
  };
  </script>
  
  
  