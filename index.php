<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cố gắng vì cậu</title>
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type = "text/css" />
    <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type = "text/css" />
    <link href="assets/backend/css/style.css" rel="stylesheet" type = "text/css" />
    
</head>
<body>
    <?php echo 'Cố gắng vì cậu' ?>
    <?php include_once(__DIR__ . '/dbconnect.php'); ?>

    <nav class="col-md-2 d-none d-md-block sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
        <!-- #################### Menu các trang Quản lý #################### -->
        <li class="nav-item sidebar-heading"><span>Quản lý</span></li>
        <li class="nav-item">
            <a href="/backend/pages/dashboard.php">Bảng tin <span class="sr-only">(current)</span></a>
        </li>
        <hr style="border: 1px solid red; width: 80%;" />
        <!-- #################### End Menu các trang Quản lý #################### -->

        <!-- #################### Menu chức năng Danh mục #################### -->
        <li class="nav-item sidebar-heading">
            <span>Danh mục</span>
        </li>
        <!-- Menu Chuyên mục sản phẩm -->
        <li class="nav-item">
            <a href="#shop_categoriesSubMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
            Chuyên mục sản phẩm
            </a>
            <ul class="collapse" id="shop_categoriesSubMenu">
            <li class="nav-item">
                <a href="/backend/functions/shop_categories/index.php">Danh sách</a>
            </li>
            <li class="nav-item">
                <a href="/backend/functions/shop_categories/create.php">Thêm mới</a>
            </li>
            </ul>
        </li>
        <!-- End Menu Chuyên mục sản phẩm -->
        <!-- #################### End Menu chức năng Danh mục #################### -->
        </ul>
        <button type="button" class="btn btn-primary">Primary</button>
        <button type="button" class="btn btn-secondary">Secondary</button>
        <button type="button" class="btn btn-success">Success</button>
        <button type="button" class="btn btn-danger">Danger</button>
        <button type="button" class="btn btn-warning">Warning</button>
        <button type="button" class="btn btn-info">Info</button>
        <button type="button" class="btn btn-light">Light</button>
        <button type="button" class="btn btn-dark">Dark</button>

        <button type="button" class="btn btn-link">Link</button>
    </div>
    </nav>

</body>
</html>