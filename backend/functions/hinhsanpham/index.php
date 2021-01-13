<!-- Nhúng file cấu hình để xác định được Tên và Tiêu đề của trang hiện tại người dùng đang truy cập -->
<?php include_once(__DIR__ . '/../../layouts/config.php'); ?>

<!DOCTYPE html>
<html>

<head>
  <!-- Nhúng file quản lý phần HEAD -->
  <?php include_once(__DIR__ . '/../../layouts/head.php'); ?>
</head>

<body class="d-flex flex-column h-100">
  <!-- header -->
  <?php include_once(__DIR__ . '/../../layouts/partials/header.php'); ?>
  <!-- end header -->

  <div class="container-fluid">
    <div class="row">
      <!-- sidebar -->
      <?php include_once(__DIR__ . '/../../layouts/partials/sidebar.php'); ?>
      <!-- end sidebar -->

      <main role="main" class="col-md-10 ml-sm-auto px-4 mb-2">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Danh sách</h1>
        </div>

        <!-- Block content -->
        <?php
  
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        include_once(__DIR__ . '/../../../dbconnect.php');

        $sql= <<<EOT
        SELECT *
        FROM `hinhsanpham` hsp
        JOIN `sanpham` sp on hsp.sp_id = sp.sp_id
EOT;
      $result= mysqli_query($conn, $sql);
      $data = [];
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $sp_tomtat = sprintf(
              "Sản phẩm %s, giá: %d"    ,
              $row['sp_ten'],
              number_format($row['sp_gia'], 2, ".", ",") . ' vnđ'
            );
  
            $data[] = array(
              'hsp_id' => $row['hsp_id'],
              'hsp_tentaptin' => $row['hsp_tentaptin'],
              'sp_tomtat' => $sp_tomtat,
            );
        }

        ?>

        <!-- Nút thêm mới, bấm vào sẽ hiển thị form nhập thông tin Thêm mới -->
        <a href="create.php" class="btn btn-success">
          Thêm mới
        </a>
        <table class="table table-bordered table-hover mt-2">
          <thead class="thead-dark">
            <tr>
              <th>Mã Hình Sản phẩm</th>
              <th>Hình ảnh</th>
              <th>Sản phẩm</th>
              <th>Hành động</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($data as $hinhsanpham): ?>
            <tr>
              <td><?= $hinhsanpham['hsp_id'] ?></td>
              <td>
                <img src="/cogangvicau/assets/uploads/products/<?= $hinhsanpham['hsp_tentaptin'] ?>" class="img-fluid" width="100px" />
              </td>
              <td><?= $hinhsanpham['sp_tomtat'] ?></td>
              <td>
                <!-- Nút sửa, bấm vào sẽ hiển thị form hiệu chỉnh thông tin dựa vào khóa chính `hsp_id` -->
                <a href="edit.php?hsp_id=<?= $hinhsanpham['hsp_id'] ?>" class="btn btn-secondary">
                  Sửa
                </a>

                <!-- Nút xóa, bấm vào sẽ xóa thông tin dựa vào khóa chính `sp_id` -->
                <a href="delete.php?hsp_id=<?= $hinhsanpham['hsp_id'] ?>" class="btn btn-light">
                  Xóa
                </a>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        <!-- End block content -->
      </main>
    </div>
  </div>
  <script>
    // Hiển thị ảnh preview (xem trước) khi người dùng chọn Ảnh
    const reader = new FileReader();
    const fileInput = document.getElementById("hsp_tentaptin");
    const img = document.getElementById("preview-img");
    reader.onload = e => {
      img.src = e.target.result;
    }
    fileInput.addEventListener('change', e => {
      const f = e.target.files[0];
      reader.readAsDataURL(f);
    })
  </script>
  <!-- footer -->
  <?php include_once(__DIR__ . '/../../layouts/partials/footer.php'); ?>
  <!-- end footer -->

  <!-- Nhúng file quản lý phần SCRIPT JAVASCRIPT -->
  <?php include_once(__DIR__ . '/../../layouts/scripts.php'); ?>

  <!-- Các file Javascript sử dụng riêng cho trang này, liên kết tại đây -->
  <!-- <script src="..."></script> -->
</body>

</html>