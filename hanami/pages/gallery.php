  <div class="container my-5">
    <h2 class="text-center mb-4">作品集</h2>

    <!-- 分類按鈕 -->
    <div class="text-center mb-4">
      <button class="btn btn-outline-danger mx-1 filter-btn" data-filter="all">全部</button>
      <button class="btn btn-outline-danger mx-1 filter-btn" data-filter="nail-a">預算設計 A</button>
      <button class="btn btn-outline-danger mx-1 filter-btn" data-filter="nail-b">預算設計 B</button>
      <button class="btn btn-outline-danger mx-1 filter-btn" data-filter="wax">熱蠟除毛</button>
      <button class="btn btn-outline-danger mx-1 filter-btn" data-filter="face">臉部保養</button>
      <button class="btn btn-outline-danger mx-1 filter-btn" data-filter="moxa">艾草溫罐</button>
    </div>

    <!-- 圖片區 -->
    <div class="row g-3" id="gallery">
      <!-- 手部美甲 A -->
      <div class="col-sm-6 col-md-4 gallery-item nail-a">
        <img src="https://i.pinimg.com/736x/f3/f3/37/f3f33710f28d055bf48b08ed5b06d9db.jpg" class="img-fluid rounded" alt="預算設計 A1">
      </div>
      <div class="col-sm-6 col-md-4 gallery-item nail-a">
        <img src="https://i.pinimg.com/736x/2b/22/b3/2b22b3f9a1a782886120c8babdd95682.jpg" class="img-fluid rounded" alt="預算設計 A2">
      </div>

      <!-- 手部美甲 B -->
      <div class="col-sm-6 col-md-4 gallery-item nail-b">
        <img src="https://i.pinimg.com/736x/18/31/1f/18311f8a6b2fe1c282f57bd89904c6e1.jpg" class="img-fluid rounded" alt="預算設計 B1">
      </div>
      <div class="col-sm-6 col-md-4 gallery-item nail-b">
        <img src="https://i.pinimg.com/736x/50/38/76/503876efab9c6bb633f86137dbee0f57.jpg" class="img-fluid rounded" alt="預算設計 B1">
      </div>

      <!-- 熱蠟除毛 -->
      <div class="col-sm-6 col-md-4 gallery-item wax">
        <img src="https://i.pinimg.com/736x/f6/8d/1f/f68d1f063b3ccae104a49a988b769e08.jpg" class="img-fluid rounded" alt="熱蠟除毛">
      </div>

      <!-- 臉部保養 -->
      <div class="col-sm-6 col-md-4 gallery-item face">
        <img src="https://i.pinimg.com/736x/0e/69/18/0e69187bd6270d5f246d2e77c6ba0d33.jpg" class="img-fluid rounded" alt="臉部保養">
      </div>
      <div class="col-sm-6 col-md-4 gallery-item face">
        <img src="https://i.pinimg.com/736x/5f/2e/cd/5f2ecd5c224957d0053c57ce3b01a081.jpg" class="img-fluid rounded" alt="臉部保養">
      </div>

      <!-- 艾草溫罐 -->
      <div class="col-sm-6 col-md-4 gallery-item moxa">
        <img src="https://i.pinimg.com/736x/f6/5a/6b/f65a6b0b3704ed8716bb67e680b780ec.jpg" class="img-fluid rounded" alt="艾草溫罐">
      </div>
    </div>
  </div>

  <script>
    $(function () {
      $(".filter-btn").click(function () {
        const filter = $(this).data("filter");
        if (filter === "all") {
          $(".gallery-item").show();
        } else {
          $(".gallery-item").hide();
          $("." + filter).show();
        }
      });
    });
  </script>

