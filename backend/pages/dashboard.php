<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bao cao san pham</title>
    <link href="/cogang/assets/vendor/Chart.js/Chart.min.css" />
</head>
<body>
    <h1>Bang tin dashboard</h1>
    <div class="row">
        <div class="col-sm-6 col-lg-3">
            <div class="card text-white bg-primary mb-2">
                <div class="card-body pb-0">
                    <div class="text-value" id="baocaoSanPham_SoLuong">
                        <h1>0</h1>
                    </div>
                    <div>Tổng số sản phẩm</div>
                </div>
            </div>
            <button class="btn btn-primary btn-sm form-control" id="refreshBaoCaoSanPham">Refresh dữ liệu</button>
            
        </div> 
    </div>
    <div class="row">
        <!-- Biểu đồ thống kê loại sản phẩm -->
        <div class="col-sm-6 col-lg-6">
            <canvas id="chartOfobjChartThongKeLoaiSanPham"></canvas>
            <button class="btn btn-outline-primary btn-sm form-control" id="refreshThongKeLoaiSanPham">Refresh dữ liệu</button>
        </div><!-- col -->

    </div>
    <script src="/cogang/assets/vendor/jquery/jquery.min.js" ></script>
    <script src="/cogang/assets/vendor/Chart.js\Chart.min.js" ></script>
    <script>
        $(document).ready(function() {
            function getDuLieuBaoCaoTongSoMatHang() {
            $.ajax('/cogang/backend/api/baocao_tongsosanpham.php', {
                success: function(data) {
                    var dataObj = JSON.parse(data);
                    var htmlString = `<h1>${dataObj.SoLuong}</h1>`;
                    $('#baocaoSanPham_SoLuong').html(htmlString);
                },
                error: function() {
                    var htmlString = `<h1>Không thể xử lý</h1>`;
                    $('#baocaoSanPham_SoLuong').html(htmlString);
                }
                });
            }
            $('#refreshBaoCaoSanPham').click(function(event) {
                getDuLieuBaoCaoTongSoMatHang();
            });

            var $objChartThongKeLoaiSanPham;
            var $chartOfobjChartThongKeLoaiSanPham = document.getElementById("chartOfobjChartThongKeLoaiSanPham").getContext(
                "2d");

            function renderChartThongKeLoaiSanPham() {
                $.ajax({
                url: '/cogang/backend/api/baocao-thongkeloaisanpham.php',
                type: "GET",
                success: function(response) {
                    var data = JSON.parse(response);
                    var myLabels = [];
                    var myData = [];
                    $(data).each(function() {
                    myLabels.push((this.TenLoaiSanPham));
                    myData.push(this.SoLuong);
                    });
                    myData.push(0); // tạo dòng số liệu 0
                    if (typeof $objChartThongKeLoaiSanPham !== "undefined") {
                    $objChartThongKeLoaiSanPham.destroy();
                    }
                    $objChartThongKeLoaiSanPham = new Chart($chartOfobjChartThongKeLoaiSanPham, {
                    // Kiểu biểu đồ muốn vẽ. Các bạn xem thêm trên trang ChartJS
                    type: "bar",
                    data: {
                        labels: myLabels,
                        datasets: [{
                        data: myData,
                        borderColor: "#9ad0f5",
                        backgroundColor: "#9ad0f5",
                        borderWidth: 1
                        }]
                    },
                    // Cấu hình dành cho biểu đồ của ChartJS
                    options: {
                        legend: {
                        display: false
                        },
                        title: {
                        display: true,
                        text: "Thống kê Loại sản phẩm"
                        },
                        responsive: true
                    }
                    });
                }
                });
            };
            $('#refreshThongKeLoaiSanPham').click(function(event) {
                event.preventDefault();
                renderChartThongKeLoaiSanPham();
            });
        });
    </script>
</body>
</html>