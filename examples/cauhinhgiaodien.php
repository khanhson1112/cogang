<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .Sag{
            background: #fff;
            color: #000;
        }
        .Toi{
            background: #000;
            color: yellow;
        }
    </style>
    <?php 
        $giaodien='Sag';
        if(isset($_COOKIE['giaodien'])){
            $giaodien= isset($_COOKIE['giaodien']) ? $_COOKIE['giaodien'] : 'Sag';
        }
    ?>
</head>
<body class="<?= $giaodien ?> " >
    Cau hinh giao dien trong php
    <form id="frmGiaodine" name="frmGiaodine" action="" method="post">
        <label><input type="radio" name="Giaodien" id="theme_1" value = "Sag" checked/>Nen sang</label> <br />
        <label><input type="radio" name="Giaodien" id="theme_2" value = "Toi"/>Nen toi</label> <br />
        <input type="submit" name="btnLuugiaodien" value="Lưu" />
    </form>
    <?php
        if(isset($_POST['btnLuugiaodien'])){
            $Giaodien = $_POST['Giaodien'];
            setcookie('giaodien', $Giaodien, time() + 3600, '/');
            echo "<h2>Cấu hình đã được lưu!</h2>";
        }
    ?>
</body>
</html>