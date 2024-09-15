<?php
require_once("include/conn_db.php");
require_once("include/php_lib.php");
//↓如果SESSION沒有啟動，則啟動SESSION功能，這是跨網頁變數存取
(!isset($_SESSION)) ? session_start() : "";
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
        <div class="row lesson">
          <div class="card">
            <img src="./images/coffee_lessons.jpg" class="card-img" alt="手沖咖啡線上課程">
            <div class="card-img-overlay text_flex">
              <h5 class="card-title">手沖咖啡課程招生中</h5>
              <p class="card-text">適合完全無經驗要進入手沖咖啡的您或是已經沖煮一段時間卻苦無方法的您！<br>
                仿間琳琅滿目的手沖咖啡器具到底要怎麼選擇？<br>
                手沖咖啡注水技巧到底有什麼樣的技巧？<br>
                透過理論與實務操作方式，以快速且專業的角度帶領您。走進手沖咖啡殿堂。</p>
            </div>
          </div>
        </div>
        <div class="row news">
          <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="./images/cama_slide1.jpg" class="d-block" alt="...">
              </div>
              <div class="carousel-item">
                <img src="./images/cama_slide2.jpg" class="d-block" alt="...">
              </div>
              <div class="carousel-item">
                <img src="./images/cama_slide3.jpg" class="d-block" alt="...">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
              data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
              data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
      </section>
      <!-- recommendation -->
      <?php require_once("./include/recommendation_DD.php"); ?>
      <!-- footer -->
      <?php require_once("./include/footer_DD.php"); ?>
    </section>
  </div>
</body>
<?php require_once("include/jsfile.php"); ?>
<!-- <script type="text/javascript" src="./include/nav_dropdown_hover.js"></script> -->

</html>