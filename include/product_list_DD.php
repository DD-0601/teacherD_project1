<?php
//建立product藥妝商品RS
$maxRows_rs = 12; //分頁最大顯示數量設定
$pageNum_rs = 0;  //起始頁=0
if (isset($_GET['pageNum_rs'])) {
    $pageNum_rs = $_GET['pageNum_rs'];
}
$startRow_rs = $pageNum_rs * $maxRows_rs;

//如網頁有收到關鍵字查詢時，執行以下
if (isset($_GET['search_name'])){
    $queryFirst = sprintf(
        "SELECT * FROM product,product_img,pyclass
        WHERE p_open=1
        AND product_img.sort=1
        AND product.p_id=product_img.p_id
        AND product.classid=pyclass.classid
        AND product.p_name LIKE '%s'
        ORDER BY product.p_id DESC",
        '%'.$_GET['search_name'].'%'
    );
//如無關鍵字查詢時，執行以下
}elseif (isset($_GET['level']) && $_GET['level'] ==1){
    //點選breadcrumb類別level 1位置出現產品列表(老師的寫法)
    $queryFirst = sprintf(
        "SELECT * FROM product,product_img,pyclass
        WHERE p_open=1 
        AND product_img.sort=1 
        AND product.p_id=product_img.p_id 
        AND product.classid=pyclass.classid
        AND pyclass.uplink='%d'
        ORDER BY product.p_id DESC", 
        $_GET['classid']);
}
// TODO:下方的程式碼跟上方的一樣，點選類別連結後，判斷是否為level1列出該類別所屬的uplink全部(此為ChatGPT的寫法)
    // if (isset($_GET['classid']) && $_GET['level'] ==1){
    // $queryFirst = sprintf(
    //     "SELECT product.*, product_img.img_file
    //     FROM pyclass
    //     JOIN product ON pyclass.classid = product.classid
    //     JOIN product_img ON product.p_id = product_img.p_id
    //     WHERE pyclass.uplink='%d'
    //     AND product_img.sort=1
    //     AND product.p_open=1
    //     ORDER BY product.p_id DESC", 
    //     $_GET['classid']);
    // }
    elseif (isset($_GET['classid'])) {
    // 當使用者於網頁點下類別時，使用產品類別classid查詢，僅顯示該classid項目
    $queryFirst = sprintf(
        "SELECT * FROM product,product_img 
        WHERE p_open=1 
        AND product_img.sort=1 
        AND product.p_id=product_img.p_id 
        AND product.classid='%d' 
        ORDER BY product.p_id DESC", 
        $_GET['classid']);
} else {
    // 如沒有使用者點選類別時，則列出全部產品product資料查詢
    $queryFirst = sprintf(
        "SELECT * FROM product,product_img 
        WHERE p_open=1 
        AND product_img.sort=1 
        AND product.p_id=product_img.p_id 
        ORDER BY product.p_id DESC");
}

$query = sprintf("%s LIMIT %d,%d", $queryFirst, $startRow_rs, $maxRows_rs);
$pList01 = $link->query($query);
$i = 1; // 控制每列row產生

//↓如果產品資料筆數不等於0，表示有資料，就執行列出產品，如產品比數等於，則執行else的alert
//↓rowCount()計算有幾筆資料
if ($pList01->rowCount() != 0) {
//<!-- cards -->
// 控制card列出product資料
while ($pList01_Rows = $pList01->fetch()) { ?>
    <?php if ($i % 3 == 1) { ?><div class="row text-center d-flex justify-content-center"> <?php } ?>
        <div class="card col-md-3">
            <img src="./product_img/<?php echo $pList01_Rows['img_file']; ?>" class="card-img-top" alt="<?php echo $pList01_Rows['p_name']; ?>" title="<?php echo $pList01_Rows['p_name']; ?>">
            <div class="card-body">
                <h5 class="card-title"><?php echo $pList01_Rows['p_name']; ?></h5>
                <p class="card-text product_intro"><?php echo mb_substr($pList01_Rows['p_intro'], 0, 30, "utf-8"); ?></p>
                <p class="card-text product_price">NT<?php echo $pList01_Rows['p_price']; ?></p>
                <a href="./products_content.php?p_id=<?php echo $pList01_Rows['p_id']; ?>" class="btn btn-primary">更多資訊</a>
                <button type="button" id="button01[]" name="button01[]" class="btn btn-success" onclick="addcart(<?php echo $pList01_Rows['p_id']; ?>)">加購物車</button>
            </div>
        </div>
        <?php if ($i % 3 == 0 || $i == $pList01->rowCount()) { ?>
        </div><?php } ?>
<?php $i++;
} ?>
<div class="row mt-2">
    <!-- 建立分頁PHP程式 -->
    <?php
    //取得目前頁數
    if (isset($_GET['totalRows_rs'])) {
        $totalRows_rs = $_GET['totalRows_rs'];
    } else {
        $all_rs = $link->query($queryFirst);
        $totalRows_rs = $all_rs->rowCount();
    }
    $totalPages_rs = ceil($totalRows_rs / $maxRows_rs) - 1;

    //呼叫分頁功能函數
    $prev_rs = "&laquo;";
    $next_rs = "&raquo;";
    $separator = "|";
    $max_links = 20;
    $pages_rs = buildNavigation($pageNum_rs, $totalPages_rs, $prev_rs, $next_rs, $separator, $max_links, true, 3, "rs");
    ?>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <?php echo $pages_rs[0] . $pages_rs[1] . $pages_rs[2]; ?>
        </ul>
    </nav>
</div>

<?php } else { ?>
    <!--  點選分類如無產品，執行以下動作 -->
    <div class="alert alert-danger mt-3" role="alert">
        產品尚在準備中，敬請期待！
    </div>
<?php } ?>