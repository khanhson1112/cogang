<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toan</title>
</head>
<body>
    <h1>Thanh toan</h1>
    <?php
         if(!(isset($_SESSION['dadangnhap']) && $_SESSION['dadangnhap']))
         
         echo 'Ban chua dang nhap vui long <a href="dangnhap.php">Click vao day</a> de dang nhap';
         die;
    ?>
   
</body>
</html>