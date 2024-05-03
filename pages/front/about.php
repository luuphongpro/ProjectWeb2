<section class="about_section layout_padding" style="background-color: #DDBC95; color: #222222">
  <div class="container">

    <div class="row">
      <div class="col-md-6">
        <div class="img-box">
          <img src="images/about-img.png" alt="">
        </div>
      </div>
      <div class="col-md-6">
        <div class="detail-box">
          <div class="heading_container">
            <h2>Ăn không sợ BÉO!</h2>
          </div>
          <p>Chào mừng bạn đến với "Ăn Không Sợ Béo!", nơi kết hợp giữa đồ ăn nhanh và chất lượng mà không cần lo lắng về vấn đề cân nặng!</p>
          <p>Tại "Ăn Không Sợ Béo!", chúng tôi tự hào mang đến cho khách hàng những lựa chọn đa dạng từ pizza thơm ngon, hamburger ngon miệng đến gà rán giòn tan. Chúng tôi cam kết sử dụng nguyên liệu tươi ngon và chế biến theo phương pháp hiện đại, giúp giảm lượng calo và chất béo mà vẫn giữ được hương vị đặc trưng.</p>
          <p>Nếu bạn muốn thưởng thức một chiếc pizza đầy phô mai và các loại nguyên liệu tươi ngon, hay thưởng thức một chiếc hamburger hấp dẫn với thịt bò mềm và sốt đậm đà, hãy đến với "Ăn Không Sợ Béo!" ngay hôm nay!</p>
          <a class="read-more" style="width: 170px">Xem Thêm</a>
          <div class="more-content">
          <p>Ngoài ra, với không gian thoải mái và phục vụ nhanh chóng, "Ăn Không Sợ Béo!" là địa điểm lý tưởng cho bữa trưa nhanh chóng hay những buổi gặp gỡ bạn bè thú vị. Với chúng tôi, ẩm thực ngon và lành mạnh không chỉ là một lựa chọn mà còn là một phong cách sống.</p>
          <p>Hãy ghé thăm "Ăn Không Sợ Béo!" ngay hôm nay và khám phá thế giới hương vị đa dạng mà không lo lắng về việc tăng cân!</p>
          <div class="less-content"> 
          <a class="read-less"  style="width: 149px">Thu gọn</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<style>
  .more-content {
    display: none;
  }
  .read-more {
    cursor: pointer;
    color: blue;
  }
  .read-more, .read-less{
    justify-content: center;
    align-items: center; 
    cursor: pointer;
  }
  p{
    font-size: 20px;
  }
</style>
<script>
  document.querySelector('.read-more').addEventListener('click', function() {
    document.querySelector('.more-content').style.display = 'block';
    document.querySelector('.read-more').style.display = 'none';
  });

  document.querySelector('.read-less').addEventListener('click', function() {
    document.querySelector('.more-content').style.display = 'none';
    document.querySelector('.read-more').style.display = 'block';
  });
</script>
