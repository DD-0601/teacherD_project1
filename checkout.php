<?php
require_once("include/conn_db.php");
require_once("include/php_lib.php");
//↓如果SESSION沒有啟動，則啟動SESSION功能，這是跨網頁變數存取
(!isset($_SESSION)) ? session_start() : "";

//強制使用者登入
// if (!isset($_SESSION['login'])) {
//   $sPath = "login.php?sPath=checkout";
//   header(sprintf("Location: %s", $sPath));
// }
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
        <div class="container product_list cart">
          <div class="row">
            <div class="col-md-12">
              <?php
              //取得收件者地址資料
              $SQLstring = sprintf(
                "SELECT *,
            city.Name as ctName,
            town.Name as toName
            FROM addbook,city,town
            WHERE emailid='%d'
            AND setdefault='1'
            AND addbook.myzip=town.Post
            AND town.AutoNo=city.AutoNo",
                $_SESSION['emailid']
              );
              $addbook_rs = $link->query($SQLstring);
              if ($addbook_rs && $addbook_rs->rowCount() != 0) {
                $data = $addbook_rs->fetch();
                $cname = $data['cname'];
                $mobile = $data['mobile'];
                $myzip = $data['myzip'];
                $address = $data['address'];
                $ctName = $data['ctName'];
                $toName = $data['toName'];
              } else {
                $cname = "";
                $mobile = "";
                $myzip = "";
                $address = "";
                $ctName = "";
                $toName = "";
              }
              ?>
              <h3>Coffee Club會員：<?php echo $_SESSION['cname']; ?>結帳作業</h3>
              <div class="row">
                <!-- ↓建立收件人樣板 -->
                <div class="card col">
                  <div class="card-header" style="color: #007bff;"><i class="fas fa-truck fa-flip-horizontal me-1"></i>
                    配送資訊
                  </div>
                  <div class="card-body">
                    <h4 class="card-title">收件人資訊：</h4>
                    <h5 class="card-title">姓名：<?php echo $cname; ?></h5>
                    <p class="card-text">電話：<?php echo $mobile; ?></p>
                    <p class="card-text">郵遞區號：<?php echo $myzip; ?></p>
                    <p class="card-text">地址：<?php echo $address; ?></p>
                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">選擇其他收件人</button>
                    <!-- ↑啟動modal -->
                  </div>
                </div>
                <!-- ↓建立付款方式樣板 -->
                <div class="card col ms-3">
                  <div class="card-header" style="color: #000;"><i class="fas fa-credit-card me-1"></i>
                    付款方式
                  </div>
                  <div class="card-body pl-3 pt-2 pb-2">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                      <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true" style="color:#007bff !important;font-size:14pt;">貨到付款</button>
                      </li>
                      <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false" style="color:#007bff !important;font-size:14pt;">信用卡</button>
                      </li>
                      <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false" style="color:#007bff !important;font-size:14pt;">銀行轉帳</button>
                      </li>
                      <li class="nav-item" role="presentation">
                        <button class="nav-link" id="epay-tab" data-bs-toggle="tab" data-bs-target="#epay" type="button" role="tab" aria-controls="epay" aria-selected="false" style="color:#007bff !important;font-size:14pt;">電子支付</button>
                      </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                      <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                        <h5 class="card-title pt-3">收件人資訊：</h5>
                        <h5 class="card-title">姓名：<?php echo $cname; ?></h5>
                        <p class="card-text">電話：<?php echo $mobile; ?></p>
                        <p class="card-text">郵遞區號：<?php echo $myzip; ?></p>
                        <p class="card-text"><?php echo $address; ?></p>
                      </div>
                      <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                        <table class="table caption-top">
                          <caption>選擇付款帳戶</caption>
                          <thead>
                            <tr>
                              <th scope="col" width="5%">#</th>
                              <th scope="col" width="35%">信用卡系統</th>
                              <th scope="col" width="30%">發卡銀行</th>
                              <th scope="col" width="30%">信用卡號</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <th scope="row"><input type="radio" name="creditCard" id="creditCard[]" checked></th>
                              <td><img src="./images/Visa_Inc._logo.svg" alt="visa" class="img-fluid"></td>
                              <td>玉山商業銀行</td>
                              <td>1234****</td>
                            </tr>
                            <tr>
                              <th scope="row"><input type="radio" name="creditCard" id="creditCard[]"></th>
                              <td><img src="./images/MasterCard_Logo.svg" alt="master" class="img-fluid"></td>
                              <td>玉山商業銀行</td>
                              <td>1234****</td>
                            </tr>
                            <tr>
                              <th scope="row"><input type="radio" name="creditCard" id="creditCard[]"></th>
                              <td><img src="./images/UnionPay_logo.svg" alt="unionpay" class="img-fluid"></td>
                              <td>玉山商業銀行</td>
                              <td>1234****</td>
                            </tr>
                          </tbody>
                        </table>
                        <hr>
                        <button type="button" class="btn btn-outline-success">使用其他信用卡付款</button>
                      </div>
                      <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
                        <h4 class="card-title pt-3">ATM匯款資訊</h4>
                        <img src="./images/Cathay-bk-rgb-db.svg" alt="cathay" class="img-fluid">
                        <h5 class="card-title">匯款銀行：國泰世華銀行 銀行代碼：013</h5>
                        <h5 class="card-title">姓名：林小強</h5>
                        <p class="card-text">匯款帳號：1234-4567-7890-1234</p>
                        <p class="card-text">備註：匯款完成後，需要1、2個工作天，待系統入款完成後，將以簡訊通知訂單完成付款。</p>
                      </div>
                      <div class="tab-pane fade" id="epay" role="tabpanel" aria-labelledby="epay-tab" tabindex="0">
                        <table class="table caption-top">
                          <caption>選擇電子支付方式</caption>
                          <thead>
                            <tr>
                              <th scope="col" width="5%">#</th>
                              <th scope="col" width="35%">電子支付系統</th>
                              <th scope="col" width="60%">電子支付公司</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <th scope="row"><input type="radio" name="epay[]" id="epay[]" checked></th>
                              <td><img src="./images/Apple_Pay_logo.svg" alt="applepay" class="img-fluid"></td>
                              <td>Apple Pay</td>
                            </tr>
                            <tr>
                              <th scope="row"><input type="radio" name="epay[]" id="epay[]"></th>
                              <td><img src="./images/Line_pay_logo.svg" alt="linePay" class="img-fluid"></td>
                              <td>Line Pay</td>
                            </tr>
                            <tr>
                              <th scope="row"><input type="radio" name="epay[]" id="epay[]"></th>
                              <td><img src="./images/JKOPAY_logo.svg" alt="jkopay" class="img-fluid"></td>
                              <td>JKOPAY</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php
              //建立購物車資料庫查詢
              $SQLstring =
                "SELECT * FROM cart,product,product_img
                WHERE ip='" . $_SERVER['REMOTE_ADDR'] . "'
                AND orderid IS NULL
                AND cart.p_id=product_img.p_id
                AND cart.p_id=product.p_id
                AND product_img.sort=1
                ORDER BY cartid DESC";

              $cart_rs = $link->query($SQLstring);
              $ptotal = 0; //設定金額累加的變數，初始=0
              ?>
              <div class="table-responsive-md">
                <table class="table table-hover mt-3 cart_table">
                  <thead>
                    <tr class="table-warning text-center">
                      <td width="10%">項次</td>
                      <td width="10%">圖片</td>
                      <td width="30%">名稱</td>
                      <td width="15%">價格</td>
                      <td width="15%">數量</td>
                      <td width="20%">小計</td>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $serial_number = 0;
                    while ($cart_data = $cart_rs->fetch()) {
                      $serial_number++; ?>
                      <tr class="text-center align-middle">
                        <td><?php echo $serial_number; ?></td>
                        <td><img src="./product_img/<?php echo $cart_data['img_file']; ?>" alt="<?php echo $cart_data['p_name']; ?>" class="img-fluid"></td>
                        <td><?php echo $cart_data['p_name']; ?></td>
                        <td>
                          <p class="pt-1">$<?php echo $cart_data['p_price']; ?></p>
                        </td>
                        <td style="min-width: 100px">
                          <?php echo $cart_data['qty']; ?>
                        </td>
                        <td>
                          <p id="subtotal">$<?php echo $cart_data['p_price'] * $cart_data['qty']; ?></p>
                        </td>
                      </tr>
                    <?php $ptotal += $cart_data['p_price'] * $cart_data['qty'];
                    } ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <td colspan="7">
                        <div class="tfoot">累計：<?php echo $ptotal; ?></div>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="7">
                        <div class="tfoot">運費：<span id="shipping_fee">100</span></div>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="7">
                        <div class="tfoot">總計：<span id="total_sum"><?php echo $ptotal + 100; ?></span></div>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="7">
                        <div class="tfoot">
                          <button type="button" id="btn04" name="btn04" class="btn btn-danger"><i class="fas fa-cart-arrow-down pr-2"></i>確認結帳</button>
                          <button type="button" id="btn05" name="btn05" class="btn btn-warning mr-2" onclick="window.history.go(-1);"><i class="fas fa-undo-alt pr-2"></i>回上一頁</button>
                        </div>
                      </td>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
        <?php require_once("./include/footer_DD.php"); ?>
      </section>
  </div>
  <!-- 收件人 -->
  <?php
  //取得所有收件人資料
  $SQLstring = sprintf(
    "SELECT *,
      city.Name AS ctName,
      town.Name AS toName
      FROM addbook,city,town
      WHERE emailid='%d'
      AND addbook.myzip=town.Post
      AND town.AutoNo=city.AutoNo",
    $_SESSION['emailid']
  );
  $addbook_rs = $link->query($SQLstring);
  ?>
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">收件人資訊</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <!-- <span aria-hidden="true">&times;</span> 視窗會有兩個叉叉，多餘的?故先註解 -->
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="row">
              <div class="col">
                <input type="text" name="cname" id="cname" class="form-control" placeholder="收件者姓名">
              </div>
              <div class="col">
                <input type="text" name="mobile" id="mobile" class="form-control" placeholder="收件者電話">
              </div>
              <div class="col">
                <select name="myCity" id="myCity" class="form-control">
                  <option value="">請選擇市區</option>
                  <?php
                  $city = "SELECT * FROM city WHERE State=0";
                  $city_rs = $link->query($city);
                  while ($city_rows = $city_rs->fetch()) { ?>
                    <option value="<?php echo $city_rows['AutoNo']; ?>"><?php echo $city_rows['Name']; ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="col">
                <select name="myTown" id="myTown" class="form-control">
                  <option value="">請選擇地區</option>
                </select>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col">
                <input type="hidden" name="myZip" id="myZip" value="">
                <label for="address" name="add_label" id="add_label">郵遞區號</label>
                <input type="text" name="address" id="address" class="form-control">
              </div>
            </div>
            <div class="row mt-4 justify-content-center">
              <div class="col-auto">
                <button type="button" class="btn btn-success" id="recipient" name="recipient">新增收件人</button>
              </div>
            </div>
          </form>
          <hr>
          <table class="table">
            <thead class="table-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">收件人姓名</th>
                <th scope="col">電話</th>
                <th scope="col">地址</th>
              </tr>
            </thead>
            <tbody>
              <?php while ($data = $addbook_rs->fetch()) { ?>
                <tr>
                  <th scope="row"><input type="radio" name="gridRadios" id="gridRadios[]" value="<?php echo $data['addressid']; ?>" <?php echo ($data['setdefault']) ? 'checked' : ''; ?>></th>
                  <td><?php echo $data['cname']; ?></td>
                  <td><?php echo $data['mobile']; ?></td>
                  <td><?php
                      echo $data['myzip'];
                      echo $data['ctName'];
                      echo $data['toName'];
                      echo $data['address']; ?></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
        <div class="modal-footer justify-content-center">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">關閉</button>
        </div>
      </div>
    </div>
  </div>
  <div id="loading" name="loading" style="display:none; position:fixed; width:100%; height:100%; top:0; left:0; background-color:rgba(255,255,255,.5); z-index:9999;"><i class="fas fa-spinner fa-spin fa-5x fa-fw" style="position:absolute; top:50%; left:50%;"></i></div>
</body>
<?php require_once("include/jsfile.php"); ?>
<script type="text/javascript">
  //新增收件人程式
  $('#recipient').click(function() {
    var validate = 0,
      msg = "";
    var cname = $('#cname').val();
    var mobile = $('#mobile').val();
    var myZip = $('#myZip').val();
    var address = $('#address').val();
    if (cname == "") {
      msg = msg + "收件人不得為空白！;\n";
      validate = 1;
    }
    if (mobile == "") {
      msg = msg + "電話不得為空白！;\n";
      validate = 1;
    }
    if (myZip == "") {
      msg = msg + "郵遞區號不得為空白！;\n";
      validate = 1;
    }
    if (address == "") {
      msg = msg + "地址不得為空白！;\n";
      validate = 1;
    }
    if (validate) {
      alert(msg);
      return false;
    }
    $.ajax({
      url: './include/addbook.php',
      type: 'post',
      datatype: 'json',
      data: {
        cname: cname,
        mobile: mobile,
        myZip: myZip,
        address: address,
      },
      success: function(data) {
        if (data.c == true) {
          alert(data.m);
          window.location.reload();
        } else {
          alert("Database response error:" + data.m);
        }
      },
      error: function(data) {
        alert("系統目前無法連接到後台資料庫(新增收件人)");
      }
    });
  });
</script>
<script type="text/javascript">
  //取得縣市代碼後查詢鄉鎮市的名稱
  $(function() {
    $("#myCity").change(function() {
      var CNo = $('#myCity').val();
      if (CNo == "") {
        return false;
      }
      $.ajax({
        //將鄉鎮市的名稱從後台資料庫取回
        url: './include/Town_ajax.php',
        type: 'post',
        dataType: 'json',
        data: {
          CNo: CNo,
        },
        success: function(data) {
          if (data.c == true) {
            $('#myTown').html(data.m);
            $('#myZip').val("");
          } else {
            alert(data.m);
          }
        },
        error: function(data) {
          alert("系統目前無法連接到後台資料庫(取得鄉鎮市名稱)");
        }
      });
    });

    //取得鄉鎮市代碼，查詢郵遞區號放入 #myZip, #zipcode
    $("#myTown").change(function() {
      var AutoNo = $("#myTown").val();
      if (AutoNo == "") {
        $('#myzip').val(""); //register.php沒有的部分
        $('#add_label').html(""); //register.php沒有的部分
        return false;
      }
      $.ajax({
        url: './include/Zip_ajax.php',
        type: 'get',
        dataType: 'json',
        data: {
          AutoNo: AutoNo,
        },
        success: function(data) {
          if (data.c == true) {
            $("#myZip").val(data.Post);
            $('#add_label').html('郵遞區號：' + data.Post + data.Cityname + data.Name); //與register.php不同的部分
          } else {
            alert(data.m);
          }
        },
        error: function(data) {
          alert("系統目前無法連接到後台資料庫(取得鄉鎮市代碼)");
        }
      });
    });

  });
</script>

</html>