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
        <form name="frmLoaiSanPham" id="frmLoaiSanPham" method="post" action="">
          <div class="form-group">
            <label for="id">ID loại sản phẩm</label>
            <input type="text" class="form-control" id="id" name="id" placeholder="ID loại sản phẩm" readonly>
            <small id="idHelp" class="form-text text-muted">ID loại sản phẩm không được hiệu chỉnh.</small>
          </div>
         
          <div class="form-group">
            <label for="category_name">Tên loại sản phẩm</label>
            <input type="text" class="form-control" id="lsp_ten" name="lsp_ten" placeholder="Tên loại sản phẩm" value="">
          </div>
          <div class="form-group">
            <label for="description">Mô tả loại sản phẩm</label>
            <textarea class="form-control" id="lsp_mota" name="lsp_mota" placeholder="Mô tả loại sản phẩm"></textarea>
          </div>
          <button class="btn btn-primary" name="btnSave">Lưu dữ liệu</button>
        </form>
        <?php
          include_once(__DIR__.'/../../../dbconnect.php');
          if(isset($_POST['btnSave'])){
            $lsp_ten=$_POST['lsp_ten'];
            $lsp_mota=$_POST['lsp_mota'];
            
          
          $sqlLoaisanpham = <<<EOT
            INSERT INTO loaisanpham
            (lsp_ten, lsp_mota)
            VALUES (' $lsp_ten', ' $lsp_mota')
EOT;
          mysqli_query($conn, $sqlLoaisanpham) or die( "Co loi khi thuc hien cvau lenh:". mysqli_error($conn). "Cau lenh vua thuc thi: $sqlLoaisanpham");
          mysqli_close($conn);
          echo '<script>location.href="index.php";</script>';
        }
        ?>
      </main>
    </div>
  </div>
</body>
</html>