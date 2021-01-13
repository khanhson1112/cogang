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
    <div class="container">
        <div class="row">
        <?php
 
        include_once(__DIR__ . '/../../../dbconnect.php');
        $stt = 1;
        $sql = <<<EOT
        SELECT *
        FROM sanpham AS sp
        JOIN nhasanxuat AS n ON sp.nsx_id = n.nsx_id
        JOIN loaisanpham AS l ON sp.lsp_id = l.lsp_id
        LEFT JOIN khuyenmai AS km ON sp.km_id = km.km_id
EOT;
        $result = mysqli_query($conn, $sql);


        $formateData = [];
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $km_hihi= 'kkkkkkkkkkkkk';
            if(!empty($row['km_ten'])){
                $km_hihi= sprintf(
                "Khuyến mãi %s, nội dung: %s, thời gian: %s-%s",
                $row['km_noidung'],
                $row['km_ten'],
                date('d/m/y', strtotime($row['km_tungay'])),
                date('d/m/y H:i:s', strtotime($row['km_denngay']))
            );
            }
            $formateData[] = array(
                'sp_id' => $row['sp_id'],
                'sp_ten' => $row['sp_ten'],
                'sp_gia' => number_format($row['sp_gia'],2,'.',',').'vnd',
                'sp_gia_cu' =>number_format($row['sp_gia_cu'],2,'.',',').'vnd',
                'sp_mota_ngan' => $row['sp_mota_ngan'],
                'sp_mota_chitiet' => $row['sp_mota_chitiet'],
                'sp_ngaycapnhat' =>  date('d/m/Y H:i:s', strtotime($row['sp_ngaycapnhat'])),
                'sp_soluong' => $row['sp_soluong'],
                'lsp_id' => $row['lsp_id'],
                'nsx_id' => $row['nsx_id'],
                'km_id' => $km_hihi
            );
        }
        ?>
        <a href="create.php" class="btn btn-primary">
          Thêm mới
        </a>
        <table class="table table-bordered table-hover mt-2">
          <thead class="thead-dark">
            <tr>
              <th>#</th>
              <th>Mã loại sản phẩm</th>
              <th>Tên loại sản phẩm</th>
              <th>Gía mới</th>
              <th>Giá cũ</th>
              <th>Mô tả ngắn</th>
              <th>Mô tả chi tiết </th>
              <th>Ngày cập nhật</th>
              <th>Số lượng</th>
              <th>Mã loại sản phẩm</th>
              <th>Mã nhà sản xuất </th>
              <th>Khuyến mãi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($formateData as $sp) : ?>
              <tr>
                <td>
                <a href="edit.php?lsp_id=<?= $loaisanpham['lsp_id'] ?>" class="btn btn-warning">
                    <span data-feather="edit"></span> Sửa
                  </a>

                  <a href="delete.php?lsp_id=<?= $loaisanpham['lsp_id'] ?>" class="btn btn-danger">
                    <span data-feather="delete"></span> Xóa
                  </a>
                </td>
                <td><?= $sp['sp_id'];?></td>
                <td><?= $sp['sp_ten'];?></td>
                <td><?= $sp['sp_gia'];?></td>
                <td><?= $sp['sp_gia_cu'];?></td>
                <td><?= $sp['sp_mota_ngan'];?></td>
                <td><?= $sp['sp_mota_chitiet'];?></td>
                <td><?= $sp['sp_ngaycapnhat'];?></td>
                <td><?= $sp['sp_soluong'];?></td>
                <td><?= $sp['lsp_id'];?></td>
                <td><?= $sp['nsx_id'];?></td>
                <td><?= $sp['km_id'];?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </main>

        </div>
    </div>
</body>
</html>