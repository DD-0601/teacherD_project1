<?php
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json;charset=utf-8'); //return json string

require_once('./conn_db.php'); //因為從jslib.js的位置呼叫conn_db.php是在同一層，路徑不需/include

if (isset($_GET['p_id']) && isset($_GET['qty'])) {
    $p_id = $_GET['p_id'];
    $qty = $_GET['qty'];
    $u_ip = $_SERVER['REMOTE_ADDR'];

    //查詢是否有相同的產品編號
    $query = "SELECT * FROM cart
    WHERE p_id=" . $p_id . " AND ip='" . $_SERVER['REMOTE_ADDR'] . "' AND orderid IS NULL";
    $result = $link->query($query);
    if ($result) {
        if ($result->rowCount() == 0) {
            //$p_id、$qty是數字，故一組引號即可，$u_ip是字串，所以要一組單引號+一組雙引號
            $query = "INSERT INTO cart (p_id, qty, ip) VALUES (" . $p_id . "," . $qty . ",'" . $u_ip . "');";
        } else {
            $cart_data = $result->fetch();
            if ($cart_data['qty'] + $qty > 49) {
                $qty = 49;    //設定產品上限為49件
            } else {
                $qty = $qty + $cart_data['qty'];  //新輸入的數量加上之前已有的數量?
            }
            $query = "UPDATE cart SET qty='" . $qty . "' WHERE cart.cartid=" . $cart_data['cartid'];
        }
        $result = $link->query($query);
        $retcode = array("c" => "1", "m" => '謝謝您！產品已加入購物車中。');
    } else {
        $retcode = array("c" => "0", "m" => '抱歉！資料無法寫入後台資料庫，請聯絡管理人員。');
    }
    //↓JSON_UNESCAPED_UNICODE將編碼過的字串解碼
    // 例：
    // 將{"c":"1","m":"\u8b1d\u8b1d\u60a8\uff01\u7522\u54c1\u5df2\u52a0\u5165\u8cfc\u7269\u8eca\u4e2d\u3002"}
    // 解碼成：("c" => "1", "m" => '謝謝您！產品已加入購物車中。')
    // echo json_encode($retcode, JSON_UNESCAPED_UNICODE);
    echo json_encode($retcode);
    //因學校PHP版本過舊，json_encode只能接受一個參數，故不使用JSON_UNESCAPED_UNICODE進行解碼
}
return;
