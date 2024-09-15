<!-- 建立查詢(使用從product_list收到的p_id查詢product_img資料表) -->
<?php
// 建立查詢條件
$SQLstring = sprintf(
    "SELECT * FROM product_img, product
                  WHERE product_img.p_id=%d
                  AND product_img.p_id=product.p_id
                  ORDER BY sort",
    $_GET['p_id']
);
// 查詢
$img_rs = $link->query($SQLstring);
// 抓資料
$imgList = $img_rs->fetch();
?>
<div class="card mb-3 mt-3 product_content">
    <div class="row g-0">
        <div class="col-md-4">
            <!-- ↓主圖 -->
            <img id="showGoods" name="showGoods" class="img-fluid m-3" src="./product_img/<?php echo $imgList['img_file']; ?>" alt="<?php echo $imgList['p_name']; ?>" title="<?php echo $imgList['p_name']; ?>">
            <!-- ↓子圖 -->
            <?php
            // 建立子圖查詢條件
            $SQLstring = sprintf(
                "SELECT * FROM product_img, product
                      WHERE sort>=2
                      AND product_img.p_id=%d
                      AND product_img.p_id=product.p_id
                      ORDER BY sort",
                $_GET['p_id']
            );
            // 查詢
            $img_rs = $link->query($SQLstring);
            // 抓資料
            $imgList = $img_rs->fetch(); ?>
            <div class="row mt-2">
                <?php do { ?>
                    <div class="col-md-4">
                        <a class="fancybox" href="product_img/<?php echo $imgList['img_file']; ?>" rel="group" title="<?php echo $imgList['p_name']; ?>">
                            <img class="img-fluid" src="product_img/<?php echo $imgList['img_file']; ?>" alt="<?php echo $imgList['p_name']; ?>" title="<?php echo $imgList['p_name']; ?>">
                        </a>
                    </div>
                <?php } while ($imgList = $img_rs->fetch()); ?>
            </div>
        </div>
        <!-- ↓產品明細內容 -->
        <?php
        // 這段產品明細查詢，跟老師用的不一樣，老師是用breadcrumb中的$data，沒有在此頁另寫查詢。
        $SQLstring = sprintf(
            "SELECT * FROM product
                    WHERE product.p_id=%d",
            $_GET['p_id']
        );
        $product_Rows = $link->query($SQLstring);
        $product_info = $product_Rows->fetch();
        ?>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title"><?php echo $product_info['p_name']; ?></h5>
                <p class="card-text text-muted"><?php echo $product_info['p_intro']; ?></p>
                <h4 class="card_price">$<?php echo $product_info['p_price']; ?></h4>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <div class="input-group input-group-lg">
                                <span class="input-group-text color-success" id="inputGroup-sizing-lg">數量</span>
                                <input type="number" id="qty" name="qty" value="1" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button name="button01" id="button01" type="button" class="btn btn-success btn-lg color-success" onclick="addcart(<?php echo $product_info['p_id']; ?>)">
                            <!--設定按下click回傳到購物車  -->
                            加入購物車</button>
                    </div>
                </div>
            </div>
        </div>