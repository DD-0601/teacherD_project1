<?php require_once("./conn_db.php"); ?>
<?php
if (isset($_GET['mode']) && $_GET['mode']!=''){
    $mode = $_GET['mode'];
    switch($mode){
        case 1:
            //使用購物車編號刪除內容
            $SQLstring=sprintf(
                "DELETE FROM cart
                WHERE cartid=%d
                AND orderid IS NULL",
                $_GET['cartid']
            );
                break;
        case 2:
            //使用IP清空購物車全部內容
            $SQLstring=sprintf(
                "DELETE FROM cart
                WHERE ip='%s'
                AND orderid IS NULL", //orderid要是null，不然以往的訂單，相同orderid也會被刪光
                $_SERVER['REMOTE_ADDR']
            );
            break;
    }
    $result=$link->query($SQLstring);
}
$deleteGoto="../cart.php"; //此檔案在include裡，未被其它檔案導入，故需回到上一層才能連結cart.php
header(sprintf("location:%s", $deleteGoto));
?>