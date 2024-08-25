<?php
require_once("include/conn_db.php");
require_once("include/php_lib.php");
?>
<!doctype html>
<html lang="zh-Tw">

<head>
  <?php require_once("./include/headfiles_DD.php"); ?>
</head>

<body>
  <div class="container-fluid">
    <section id="main_content">
      <?php require_once("./include/nav_DD.php"); ?>
      <section id="content">
        <div class="container product_list">
          <div class="row">
            <div class="col-md-12">
              <!-- breadcrumbs -->
              <?php require_once("./include/breadcrumb_DD.php"); ?>
              <!-- product_content -->
              <!-- 建立查詢(使用從product_list收到的p_id查詢product_img資料表) -->
              <?php
              // 建立查詢條件
              $SQLstring = sprintf(
                "SELECT * FROM product_img, product
                  WHERE product_img.p_id=%d
                  AND product_img.p_id=product.p_id
                  ORDER BY sort",
                $_GET['p_id']
              );
              // 查詢
              $img_rs = $link->query($SQLstring);
              // 抓資料
              $imgList = $img_rs->fetch();
              ?>
              <div class="card mb-3 mt-3 product_content">
                <div class="row g-0">
                  <div class="col-md-4">
                    <!-- ↓主圖 -->
                    <img src="./product_img/<?php echo $imgList['img_file']; ?>" alt="<?php echo $imgList['p_name']; ?>">
                    <!-- ↓子圖 -->
                    <div class="row mt-2">
                      <div class="col-md-4">
                        <a href="#">
                          <img src="" alt="">
                        </a>
                      </div>
                    </div>
                  </div>
                  <!-- ↓產品明細內容 -->
                  <?php
                  // ↓TODO:這段產品明細查詢，在建立breadcrumb之後可以改用breadcrumb中的$data，optional。
                  $SQLstring = sprintf(
                    "SELECT * FROM product
                    WHERE product.p_id=%d",
                    $_GET['p_id']
                  );
                  $product_Rows = $link->query($SQLstring);
                  $product_info = $product_Rows->fetch();
                  // ↑TODO:這段產品明細查詢，在建立breadcrumb之後可以改用breadcrumb中的$data，optional。
                  ?>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title"><?php echo $product_info['p_name']; ?></h5>
                      <p class="card-text text-muted"><?php echo $product_info['p_intro']; ?></p>
                      <h4 class="card_price">$<?php echo $product_info['p_price']; ?></h4>
                      <div class="row mt-3">
                        <div class="col-md-12">
                          <div class="col-md-6">
                            <div class="input-group input-group-lg">
                              <span class="input-group-text color-success" id="inputGroup-sizing-lg">數量</span>
                              <input type="number" id="qty" name="qty" value="1" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <button name="button01" id="button01" type="button" class="btn btn-success btn-lg color-success">
                            <!--設定按下click回傳到購物車  -->
                            加入購物車</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php require_once("./include/footer_DD.php"); ?>
      </section>
  </div>
</body>
<?php require_once("include/jsfile.php"); ?>

</html>