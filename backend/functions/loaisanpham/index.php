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
          include_once(__DIR__.'/../../../dbconnect.php');
          $sqlLoaisanpham = <<<EOT
            SELECT *
            FROM `loaisanpham`
EOT;
          $resultLoaisanpham = mysqli_query($conn, $sqlLoaisanpham);
          $dataLoaisanpham = [];
          while($row = mysqli_fetch_array($resultLoaisanpham, MYSQLI_ASSOC)){
              $dataLoaisanpham[]=array(
                'lsp_id' => $row['lsp_id'],
                'lsp_ten' => $row['lsp_ten'],
                'lsp_mota' => $row['lsp_mota'],
            
              );
            }
        ?>
      <a href="create.php" class="btn btn-primary">
        Thêm mới
      </a>
      <table class="table table-bordered table-hover mt-2">
        <thead class="thead-dark">
          <tr>
            <th>Mã loại sản phẩm</th>
            <th>Tên loại sản phẩm</th>
            <th>Mô tả loại sản phẩm</th>
            <th>Hanh doong</th>
          </tr>
        </thead>
        <tbody>
            <?php foreach($dataLoaisanpham as $lsp): ?>
            <tr>
              <td><?= $lsp['lsp_id']?></td>
              <td><?= $lsp['lsp_ten']?></td>
              <td><?= $lsp['lsp_mota']?></td>
              <td>
                <a href="edit.php" class="btn btn-warning">Sua</a>
                <a href="delete.php" class="btn btn-danger">Xoa</a>
              </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
      </table>
      </main>
    </div>
  </div>
  <?php include_once(__DIR__.'/../../layouts/partials/footer.php') ?>
  <?php include_once(__DIR__.'/../../layouts/scripts.php') ?>

</body>
</html>