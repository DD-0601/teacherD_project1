<?php
require_once("include/conn_db.php");
require_once("include/php_lib.php");
//↓如果SESSION沒有啟動，則啟動SESSION功能，這是跨網頁變數存取
(!isset($_SESSION)) ? session_start() : "";
//取得要返回的php頁面
if (isset($_GET['sPath'])) {
  $sPath = $_GET['sPath'] . ".php";
} else {
  //登入完成預設要進入首頁
  $sPath = "index_project1.php";
}
//檢查是否完成登入驗證
if (isset($_SESSION['login'])) {
  header(sprintf("location: %s", $sPath));
}
?>
<!doctype html>
<html lang="zh-Tw">

<head>
  <?php require_once("./include/headfiles_DD.php"); ?>
  <!-- login專用css -->
  <style type="text/css">
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    body {
      display: flex;
      justify-content: center;
      /* align-items: center; */
      min-height: 100vh;
      min-width: 100vw;
    }
    .container.product_list.cart{
      width: 100vw;
      height: 100vh;
      background: #FFF8;
      backdrop-filter: blur(10px);
      display: flex;
      justify-content: center;
      align-items: flex-start;
      border-radius: 1rem;
    }
    .container.product_list.cart>.row{
      
      width: 480px;
    }
    .col-md-12.login{
      padding-top: 0;
      display: flex;
      justify-content: center;
      background: none !important;
    }
    .wrapper {
      width: 420px;
      background: #387F39;
      color: #fff;
      border-radius: 1rem;
    }

    .wrapper h1 {
      font-size: 36px;
      text-align: center;
    }

    .wrapper>form{
      margin: 5px;
    }
    .wrapper .input-box {
      /* border: yellow solid 1px; */
      width: 100%;
      height: 50px;
      margin: 30px 0;
      position: relative;
    }

    .input-box input {
      width: 100%;
      height: 100%;
      background: transparent;
      border: none;
      outline: none;
      border: 2px solid rgba(255, 255, 255, .2);
      border-radius: 2rem;
      font-size: 16px;
      color: #fff;
      padding: 20px 45px 20px 20px;
    }

    .input-box input::placeholder {
      color: rgb(249, 249, 159, 0.3);
    }
    .input-box input:focus {
      background-color: rgba(137, 143, 75, 0.8);
    }

    .input-box i {
      /* border: yellow solid 1px; */
      position: absolute;
      right: 20px;
      top: 50%;
      transform: translateY(-50%);
      font-size: 20px;
    }

    .wrapper .remember-forgot {
      display: flex;
      justify-content: space-between;
      font-size: 14.5px;
      margin: -15px 0 15px;
      /*up left+right down*/
    }

    .remember-forgot label input {
      accent-color: #fff;
      margin-right: 5px;
      margin-left: 5px;
    }

    .remember-forgot a {
      color: #fff;
      text-decoration: none;
      margin-right: 5px;
    }
    #login_submit{
      width: 80%;
      margin: 5px auto;
      padding: 5px;
      font-size: 1.2rem;
      display: flex;
      justify-content: center;
    }
    #register{
      color: #F6E96B;
      margin-left: 5px;
    }
  </style>
</head>

<body>
  <div class="container-fluid">
    <section id="main_content">
      <?php require_once("./include/nav_DD.php"); ?>
      <section id="content">
        <div class="container product_list cart">
          <div class="row">
            <div class="col-md-12 login">
              <!-- login form -->
              <div class="wrapper">
                <form action="" method="post" class="form-signin" id="form1">
                  <h1>Login</h1>
                  <div class="input-box">
                    <input type="email" id="inputAccount" name="inputAccount" placeholder="Account" required autofocus>
                    <i class='bx bxs-user'></i>
                  </div>
                  <div class="input-box">
                    <input type="password" id="inputPassword" name="inputPassword" placeholder="Password" required>
                    <i class='bx bxs-lock-alt'></i>
                  </div>

                  <div class="remember-forgot">
                    <label for=""><input type="checkbox">Remember me</label>
                    <a href="#">Forgot password?</a>
                  </div>

                  <button type="submit" class="btn btn-success" id="login_submit">登入</button>

                  <div class="register-link">
                    <p>Don't have a account?<a href="./register.php" id="register">註冊</a></p>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <?php require_once("./include/footer_DD.php"); ?>
      </section>
  </div>
  <div id="loading" name="loading" style="display:none; position:fixed; width:100%; height:100%; top:0; left:0; background-color:rgba(255,255,255,.5); z-index:9999;"><i class="fas fa-spinner fa-spin fa-5x fa-fw" style="position:absolute; top:50%; left:50%;"></i></div>
</body>
<?php require_once("include/jsfile.php"); ?>
<script type="text/javascript">
  //建立會員登入功能
  $(function() {
    $("#form1").submit(function() {
      const inputAccount = $("#inputAccount").val();
      const inputPassword = MD5($("#inputPassword").val()); //使用commlib.js中的MD5()做密碼驗證
      $("#loading").show();
      //利用ajax函數呼叫後台的auth_user.php驗證帳號密碼
      $.ajax({
        url: 'auth_user.php',
        type: 'post',
        dataType: 'json',
        data: {
          inputAccount: inputAccount,
          inputPassword: inputPassword,
        },
        success: function(data) {
          if (data.c == true) {
            alert(data.m);
            window.location.href = "<?php echo $sPath; ?>";
          } else {
            alert(data.m);
          }
        },
        error: function(data) {
          alert("系統目前無法連接到資料庫");
        }
      });
    });
  });
</script>
</html>