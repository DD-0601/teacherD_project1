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
  <!-- cart專用css -->
  <style type="text/css">
    table input:invalid{
      border: 3px solid red;
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
            <div class="col-md-12">
              <?php require_once("./include/cart_content.php"); ?>
            </div>
          </div>
        </div>
        <?php require_once("./include/footer_DD.php"); ?>
      </section>
  </div>
</body>
<?php require_once("include/jsfile.php"); ?>

<!-- 
1 Create the <script> tag.
2 Set up the change event listener for input elements.
3 Capture qty and cartid.
4 Validate qty to ensure it's between 1 and 49.
5 Use AJAX to send cartid and qty to the server (change_qty.php).
6 On success, check if the response is positive and reload the page. If there's an issue, show an error.
7 On error, show a system error alert. -->
<script type="text/javascript">
    // 將變更的數量寫入後台資料庫(建立資料寫入資料庫ajax)
    $("input").change(function(){
      var qty = $(this).val();
      const cartid = $(this).attr("cartid");
      if (qty <= 0 || qty >50){
        alert("數量需為大於0，且小於50。");
        return false;
      }
      $.ajax({
        url: './include/change_qty.php',
        type: 'post',
        dataType: 'json',
        data:{
          cartid: cartid,
          qty: qty,
        },
        success: function(data){
          if (data.c == true){
            //alert(data.m);
            window.location.reload();
          }else{
            alert(data.m);
          }
        },
        error: function(data){
          alert("系統目前無法連接到後台資料庫");
        }
      });
    });
  </script>
</html>