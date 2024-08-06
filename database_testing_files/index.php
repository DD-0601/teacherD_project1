<!-- ↓這是將資料庫的連線程式載入 -->
<?php require_once("connections/conn_db.php"); ?>
<!-- ↓如果SESSION沒有啟動，則啟動SESSION功能，這是跨網頁變數存取 -->
<?php
// (!isset($_SESSION))?session_start():""; 
?>
<!-- 載入共用PHP函數庫 -->
<?php require_once("php_lib.php"); ?>

<!doctype html>
<html lang="zh-TW">

<head>
  <!-- 把head移出去建立獨立的php檔，再以模組化方式導入 -->
  <?php require_once("headfile.php"); ?>
</head>

<body>
  <section id="header">
    <!-- 導入navbar模組 -->
    <?php require_once("./navbar.php"); ?>
  </section>
  <section id="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-2">
          <!-- 導入sidebar模組 -->
          <?php require_once("./sidebar.php"); ?>

          <!-- 導入熱銷商品hot.php模組 -->
          <?php require_once("./hot.php"); ?>

        </div>
        
        <!-- carousel -->
        <div class="col-md-10">
          <!-- 導入廣告輪播carousel模組 -->
          <?php require_once("./carousel.php"); ?>
          <hr>
          <!-- 導入藥妝商品product_list模組 -->
          <?php require_once("./product_list.php"); ?>
        </div>
      </div>
    </div>
  </section>
  <hr>
  <section id="scontent">
    <!-- 導入scontent.php模組 -->
    <?php require_once("./scontent.php"); ?>
  </section>
  <section id="footer">
    <!-- 導入footer模組 -->
    <?php require_once("./footer.php"); ?>
  </section>

  <!-- bootstrap and jquery -->
  <!-- <script src="./bootstrap-5.2.3-dist/js/bootstrap.bundle.js"></script> -->
  <!-- 導入javascript與bootstrap模組 -->
  <?php require_once("./jsfile.php"); ?>
</body>

</html>