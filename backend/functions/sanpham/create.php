<?php include_once(__DIR__.'/../../layouts/config.php'); ?>
<!DOCTYPE html>
<html >
<head >
    <?php include_once(__DIR__ . '/../../layouts/head.php'); ?>
    <?php include_once(__DIR__ . '/../../layouts/meta.php'); ?>
   
</head>
<body >
  <button type="button" class="btn btn-primary">Primary</button>
  <button type="button" class="btn btn-secondary">Secondary</button>
  <button type="button" class="btn btn-success">Success</button>
  <button type="button" class="btn btn-danger">Danger</button>
  <button type="button" class="btn btn-warning">Warning</button>
  <button type="button" class="btn btn-info">Info</button>
  <button type="button" class="btn btn-light">Light</button>
  <button type="button" class="btn btn-dark">Dark</button>
  <button type="button" class="btn btn-link">Link</button>
  <div class="container">
      <br/>
  </div>
  <?php include_once(__DIR__ . '/../../layouts/partials/header.php'); ?>
  <div class="container">
      <br/>
  </div>
  <div class="container-fluid">
    <div class="row">
    <?php include_once(__DIR__.'/../../layouts/partials/sidebar.php'); ?>
      <main role="main" class="col-md-10 ml-sm-auto px-4 mb-2">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Danh sách các Loại sản phẩm</h1>
        </div>
        <?php
          ini_set('display_errors', 1);
          ini_set('display_startup_errors', 1);
          error_reporting(E_ALL);
          include_once(__DIR__.'/../../../dbconnect.php');
          $sqlSanpham = <<<EOT
            SELECT *
            FROM `sanpham`
EOT;
          $resultSanpham = mysqli_query($conn, $sqlSanpham);
          $dataSanpham = [];
          while($row = mysqli_fetch_array($resultSanpham, MYSQLI_ASSOC)){
            $sp_tomtat=sprintf(
                "San pham %s, gia %s",
                $row['sp_ten'],
                number_format($row['sp_gia'],2,".",","). 'VDN',
            )
            $dataSanpham[]=array(
            'sp_id' => row['sp_id'],
            'sp_tomtat' => $sp_tomtat,
            );
          }
        ?>
      <a href="create.php" class="btn btn-primary">
        Thêm mới
      </a>
      <form name="frmHinhsanpham" id="frmHinhsanpham" method="post" action="" enctype="multipart/form_data">
      <div class="form-group">
            <label for="sp_ma">Sản phẩm</label>
            <select class="form-control" id="sp_ma" name="sp_ma">
              <?php foreach ($dataSanPham as $sp) : ?>
                <option value="<?= $sp['sp_ma'] ?>"><?= $sp['sp_tomtat'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>
            
      </form>
      </main>
    </div>
  </div>
</body>
</html>