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
          <h1 class="h2">Đơn h</h1>
        </div>

        <!-- Block content -->
        <?php
  
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        include_once(__DIR__ . '/../../../dbconnect.php');

        $sql= <<<EOT
        SELECT dh.dh_ma, dh.dh_ngaylap, dh.dh_ngaygiao, dh.dh_trangthaithanhtoan, httt.httt_mota, kh.kh_ten, kh.kh_dienthoai,
        SUM(spddh.sp_dh_soluong * spddh.sp_dh_dongia) AS TongThanhTien
        FROM donhang AS dh
        JOIN sanpham_dondathang AS spddh ON dh.dh_ma = spddh.dh_ma
        JOIN hinhthucthanhtoan AS httt ON dh.httt_id = httt.httt_id
        JOIN khachhang AS kh ON dh.kh_id = kh.kh_id
        GROUP BY dh.dh_ma, dh.dh_ngaylap, dh.dh_ngaygiao, dh.dh_trangthaithanhtoan, httt.httt_mota, kh.kh_ten, kh.kh_dienthoai
EOT;
      $result = mysqli_query($conn, $sql);
      $data = [];
      while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { 
            $data[] = array(
              'dh_ma' => $row['dh_ma'],
              'dh_ngaylap' => $row['dh_ngaylap'],
              'dh_ngaygiao' => $row['dh_ngaygiao'],
              'dh_trangthaithanhtoan' => $row['dh_ma'],
              'httt_mota' => $row['httt_mota'],
              'kh_ten' => $row['kh_ten'],
              'kh_dienthoai' => $row['kh_dienthoai'],
              'TongThanhTien' => $row['TongThanhTien'],
            );
        }

        ?>

        <!-- Nút thêm mới, bấm vào sẽ hiển thị form nhập thông tin Thêm mới -->
        <a href="create.php" class="btn btn-success">
          Nào nào mình cùng lại đây...
        </a>
        <table class="table table-bordered table-hover mt-2">
          <thead class="thead-dark">
            <tr>
              <th>Mã Đơn đặt hàng</th>
              <th>Khách hàng</th>
              <th>Ngày lập</th>
              <th>Ngày giao</th>
              <th>Hình thức thanh toán</th>
              <th>Tổng thành tiền</th>
              <th>Trạng thái thanh toán</th>
              <th>Hành động</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($data as $donhang): ?>
            <tr>
              <td><?= $donhang['dh_ma'] ?></td>
              <td><b><?= $donhang['kh_ten'] ?></b><br />(<?= $donhang['kh_dienthoai'] ?>)</td>
              <td><?= $donhang['dh_ngaylap'] ?></td>
              <td><?= $donhang['dh_ngaygiao'] ?></td>
              <td><span class="badge badge-primary"><?= $donhang['httt_mota'] ?></span></td>
              <td><?= $donhang['TongThanhTien'] ?></td>
              <td>
                  <?php if ($donhang['dh_trangthaithanhtoan'] == 0) : ?>
                      <span class="badge badge-danger">Chưa xử lý</span>
                  <?php else : ?>
                      <span class="badge badge-success">Đã giao hàng</span>
                  <?php endif; ?>
              </td>
              <td>
                    <a class="btn btn-primary " href="print.php?dh_ma<?= $donhang['dh_ma']?>">IN</a>
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