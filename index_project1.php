<!doctype html>
<html lang="zh-Tw">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PROJECT1</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="./styles/style.css">
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
      <section id="recommendation" class="container">
        <div class="row recommendation">
          <div class="col-md-12">
            <!-- reco-card 1 -->
            <input type="radio" name="slide" id="c1" checked>
            <label for="c1" class="reco-card">
                <div class="row">
                    <div class="icon">1</div>
                    <div class="description">
                        <h4>冠軍咖啡</h4>
                        <p>Winter has so much to offer - creative activities</p>
                    </div>
                </div>
            </label>
            <!-- reco-card 2 -->
            <input type="radio" name="slide" id="c2">
            <label for="c2" class="reco-card">
                <div class="row">
                    <div class="icon">2</div>
                    <div class="description">
                        <h4>招牌阿法奇朵</h4>
                        <p>Winter has so much to offer - creative activities</p>
                    </div>
                </div>
            </label>
            <!-- reco-card 3 -->
            <input type="radio" name="slide" id="c3">
            <label for="c3" class="reco-card">
                <div class="row">
                    <div class="icon">3</div>
                    <div class="description">
                        <h4>招牌阿法奇朵</h4>
                        <p>Winter has so much to offer - creative activities</p>
                    </div>
                </div>
            </label>
            <!-- reco-card 4 -->
            <input type="radio" name="slide" id="c4">
            <label for="c4" class="reco-card">
                <div class="row">
                    <div class="icon">4</div>
                    <div class="description">
                        <h4>招牌阿法奇朵</h4>
                        <p>Winter has so much to offer - creative activities</p>
                    </div>
                </div>
            </label>
          </div>
        </div>
      </section>
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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
</body>

</html>