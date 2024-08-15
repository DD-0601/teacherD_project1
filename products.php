<?php
require_once("include/conn_db.php"); 
require_once("include/php_lib.php");
?>
<!doctype html>
<html lang="zh-Tw">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Products</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="./styles/style.css">
  <!-- <link rel="stylesheet" href="./styles/product_list.css"> -->
  <!-- font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <div class="container-fluid">
    <section id="main_content">
      <div class="remain_top fixed-top col-12">
        <div class="row logo login">
          <div class="col-lg-10 logo col-6"><span><a href="#">Coffee Club</a></span></div>
          <div class="col-lg-2 login col-6">
            <p>
              <a href="#" id="signIn" class="sign">會員登入</a><a href="#" id="signUp" class="sign">註冊</a><i class="fa-solid fa-cart-shopping"></i>
            </p>
          </div>
        </div>
        <div class="row nav">
          <div class="col-md-12">
            <nav class="navbar navbar-expand-lg">
              <div class="container-fluid">
                <a class="navbar-brand" href="#"><i class="fa-solid fa-mug-hot"></i></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                  data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                  aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">About us</a>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Items
                      </a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">手工烘焙咖啡豆</a></li>
                        <li><a class="dropdown-item" href="#">手沖咖啡</a></li>
                        <li>
                          <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">期間限定咖啡豆</a></li>
                      </ul>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Courses</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Locations</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Franchise</a>
                    </li>
                  </ul>
    
                </div>
              </div>
            </nav>
          </div>
        </div>
      </div>
      <section id="content">
        <div class="container product_list">
          <div class="row">
            <div class="col-md-12">
              <?php require_once("include/product_list(D).php"); ?>

            </div>
          </div>
        </div>
      <footer id="footer" class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-3 d-flex justify-content-center align-items-center flex-column">STAY IN TOUCH</div>
              <div class="col-md-3 d-flex justify-content-center align-items-center flex-column">
                <p>社群</p>
                <ul>
                  <li><a href="#"><i class="fa-brands fa-square-facebook"></i>FACEBOOK</a></li>
                  <li><a href="#"><i class="fa-brands fa-square-instagram"></i>INSTAGRAM</a></li>
                  <li><a href="#"><i class="fa-brands fa-youtube"></i>YOUTUBE</a></li>
                  <li><a href="#"><i class="fa-brands fa-x-twitter"></i>X(TWITTER)</a></li>
                </ul>
              </div>
              <div class="col-md-3 d-flex justify-content-center align-items-center flex-column">
                <P>聯繫我們</P>
                <ul>
                  <li><a href="#"><i class="fa-solid fa-circle-question"></i>FAQ</a></li>
                  <li><a href="#"><i class="fa-solid fa-truck"></i>寄送資訊</a></li>
                  <li><a href="#"><i class="fa-solid fa-handshake"></i>招募人才</a></li>
                  <li><a href="#"><i class="fa-solid fa-headset"></i>聯絡資訊</a></li>
                </ul>
              </div>
              <div class="col-md-3 d-flex justify-content-center align-items-center flex-column">
                <p>帳戶</p>
                <ul>
                  <li><a href="#"><i class="fa-solid fa-user"></i>我的帳戶</a></li>
                  <li><a href="#"><i class="fa-solid fa-cart-shopping"></i>購物車</a></li>
                </ul>
              </div>
            </div>
            </div>
        </div>

      </footer>
    </section>
  </div>
</body>
<?php require_once("include/jsfile.php"); ?>
</html>