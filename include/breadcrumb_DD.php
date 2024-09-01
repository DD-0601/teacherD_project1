<?php
//建立每一層類別的變數，設定空值，之後再把要顯示的內容指定給這些變數
$level1_open = "";
$level2_open = "";
$level3_open = "";


//↓如url有收到p_id並且p_id非空值時執行
if (isset($_GET['p_id']) && $_GET['p_id'] != ''){
    //使用p_id產品代碼取出資料
    $SQLstring = sprintf(
        "SELECT * FROM product, pyclass,
        (SELECT classid as upclassid,
        level as uplevel,
        cname as upcname
        FROM pyclass
        WHERE level=1) as uplevel
        WHERE product.classid=pyclass.classid
        AND pyclass.uplink=uplevel.upclassid
        AND product.p_id=%d",
        $_GET['p_id']
    );

    //查詢資料(classid_rs換成product_rows, data換成product_data)
    $product_rows = $link->query($SQLstring);
    
    //把查詢到的資料一筆一筆變成array資料
    $product_data = $product_rows->fetch();

    //處理第一層 (選擇level 1 類別)，設定level 1 要顯示的內容要顯示的內容&連結至products.php並回傳upcname, upclassid, uplevel
    $level1_upcname = $product_data['upcname'];
    $level1_upclassid = $product_data['upclassid'];
    $leve1_uplevel = $product_data['uplevel'];
    $level1_open = '<li class="breadcrumb-item"><a href="./products.php?classid='.$level1_upclassid. '&level='.$leve1_uplevel.'">'.$level1_upcname.'</a></li>';

    //處理第二層 (選擇level 2 類別)，設定level 2 要顯示的內容要顯示的內容&連結至products.php並回傳 cname, classid
    $level2_cname = $product_data['cname'];
    $level2_classid = $product_data['classid'];
    $level2_open = '<li class="breadcrumb-item"><a href="./products.php?classid='.$level2_classid.'">'.$level2_cname.'</a></li>';

    //處理第三層，設定顯示產品名稱
    $level3_open = '<li class="breadcrumb-item active" aria-current="page">'.$product_data['p_name'].'</li>';

}elseif(isset($_GET['search_name'])){
//如網頁有收到關鍵字查詢時，執行以下 breadcrumb顯示搜尋關鍵字
    $level1_open = '<li class="breadcrumb-item active" aria-current="page">關鍵字查詢:'.$_GET['search_name'].'</li>';

//以下為點選breadcrumb分類level 1時，讓對應的product_list顯示
}elseif (isset($_GET['level']) && isset($_GET['classid'])){
    //查詢level 1類別
    $SQLstring = sprintf(
        "SELECT * FROM pyclass
        WHERE level=%d
        AND classid=%d",
        $_GET['level'],
        $_GET['classid']
    );
    //查詢
    $classid_rows = $link->query($SQLstring);
    //將資料轉成array
    $product_data = $classid_rows->fetch();

    //設定level 1的cname
    $level1_cname = $product_data['cname'];
    //設定level 1 顯示類別名稱
    $level1_open = '<li class="breadcrumb-item active" aria-current="page">'.$level1_cname. '</li>';

//以下為點選breadcrumb分類level 2或分類level 1時，讓對應的product_list顯示
}elseif (isset($_GET['classid'])){
    //查詢level 2類別
    $SQLstring = sprintf(
        "SELECT * FROM pyclass
        WHERE level=2
        AND pyclass.classid=%d",
        $_GET['classid']
    );
    //查詢
    $classid_rows = $link->query($SQLstring);
    //將資料轉成array
    $product_data = $classid_rows->fetch();

    //設定level 2 的cname, uplink，要顯示的內容(cname)
    $level2_cname = $product_data['cname'];
    $level2_uplink = $product_data['uplink']; //這個uplink是要丟到下方查詢用
    //需另處理上一層
    //查詢上一層level 1的資料
    $SQLstring = sprintf(
        "SELECT * FROM pyclass
        WHERE level=1
        AND classid=%d",
        $level2_uplink
    );
    //查詢
    $classid_rows = $link->query($SQLstring);
    //將資料轉成array
    $product_data = $classid_rows->fetch();

    //設定level 1 的cname, level
    $level1_cname = $product_data['cname'];
    $level1 = $product_data['level'];
    //設定level 1 及 level 2顯示類別名稱 &連結至products.php並回傳classid及level
    $level1_open = '<li class="breadcrumb-item"><a href="./products.php?classid='.$level2_uplink.'&level='.$level1.'">'. $level1_cname .'</a></li>';
}
?>
<nav class="mt-3" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item ms-2"><a href="./index_project1.php">Home</a></li>
        <?php echo $level1_open . $level2_open . $level3_open ; ?>
    </ol>
</nav>