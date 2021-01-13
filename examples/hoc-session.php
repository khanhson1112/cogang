<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hoc session trong PHP</title>
</head>
<body>
    <h1>Session PHP</h1>
    <?php
        session_start();
        $_SESSION['user'] = 'hongson';
        $_SESSION['gmail'] = 'hongson@gmail.com';
        $_SESSION['soluong']  = 5;

        $hoten = 'Hong Son';
        $soluonggiohang = 3;
    ?>
    <ul>
        <li>ho ten : <?= $hoten ?></li>
        <li>So luong hang trong gio : <?= $soluonggiohang ?></li>
    </ul>
    <button id="btnLuu" name="btnLuu">Them san pham vao gio hang</button>
    
</body>
</html>