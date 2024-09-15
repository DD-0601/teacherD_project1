<?php
require_once("include/conn_db.php");
require_once("include/php_lib.php");
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
        <div class="container product_list">
          <div class="row">
            <div class="col-md-12">
              <!-- breadcrumbs -->
              <?php require_once("./include/breadcrumb_DD.php"); ?>
              <!-- product_content -->
              <?php require_once("./include/product_content_details.php"); ?>
              <div class="col-md-12 p_content mt-3">
                <hr>
                <?php echo $product_info['p_content']; ?>
              </div>
            </div>
          </div>
        </div>
  </div>
  </div>
  <?php require_once("./include/footer_DD.php"); ?>
  </section>
  </div>
</body>
<?php require_once("include/jsfile.php"); ?>

</html>