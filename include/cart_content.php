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
<h3>Coffee Club：購物車</h3>
<?php if ($cart_rs->rowCount() != 0) { ?>
    <a href="./products.php" id="btn01" class="btn btn-primary">繼續購物</a>
    <button type="button" id="btn02" class="btn btn-info" onclick="window.history.go(-1)">回到上一頁</button>
    <button type="button" id="btn03" class="btn btn-success" onclick="btn_confirmLink('確定清空購物車?','./include/shopcart_del.php?mode=2');">清空購物車</button>
    <a href="./checkout.php" class="btn btn-warning">前往結帳</a>
    <div class="table-responsive-md">
        <table class="table table-hover mt-3 cart_table">
            <thead>
                <tr class="table-warning text-center">
                    <td width="10%">項次</td>
                    <td width="10%">圖片</td>
                    <td width="25%">名稱</td>
                    <td width="15%">價格</td>
                    <td width="10%">數量</td>
                    <td width="15%">小計</td>
                    <td width="15%">下次再買</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $serial_number = 0;
                while ($cart_data = $cart_rs->fetch()) {
                    $serial_number++;?>
                    <tr class="text-center align-middle">
                        <td><?php echo $serial_number; ?></td>
                        <td><img src="./product_img/<?php echo $cart_data['img_file']; ?>" alt="<?php echo $cart_data['p_name']; ?>" class="img-fluid"></td>
                        <td><?php echo $cart_data['p_name']; ?></td>
                        <td>
                            <p class="pt-1">$<?php echo $cart_data['p_price']; ?></p>
                        </td>
                        <td style="min-width: 100px">
                            <div class="input-group">
                                <input type="number" class="form-control" id="qty[]" name="qty[]" value="<?php echo $cart_data['qty']; ?>" cartid="<?php echo $cart_data['cartid']; ?>" min="1" max="50" required style="min-width:60px;">
                            </div>
                        </td>
                        <td>
                            <p id="subtotal">$<?php echo $cart_data['p_price'] * $cart_data['qty']; ?></p>
                        </td>
                        <td><button type="button" id="btn[]" name="btn[]" class="btn btn-danger" onclick="btn_confirmLink('確認刪除此筆資料?','./include/shopcart_del.php?mode=1&cartid=<?php echo $cart_data['cartid']; ?>')">取消</button></td>
                        <!-- 加入取消確認功能 & 加入刪除訂單shopcart_del.php -->
                    </tr>
                <?php $ptotal += $cart_data['p_price'] * $cart_data['qty'];
                } ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="7"><div class="tfoot">累計：<?php echo $ptotal; ?></div></td>
                </tr>
                <tr>
                    <td colspan="7"><div class="tfoot">運費：<span id="shipping_fee">100</span></div></td>
                </tr>
                <tr>
                    <td colspan="7"><div class="tfoot">總計：<span id="total_sum"><?php echo $ptotal + 100; ?></span></div></td>
                </tr>
            </tfoot>
        </table>
    </div>
<?php } else { ?>
    <div class="alert alert-warning" role="alert">
        抱歉！目前購物車尚未加入產品。
    </div>
<?php } ?>