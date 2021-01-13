<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dang nhap</title>
</head>
<body>
    <?php
        session_start();
    ?>
    <?php
        if(isset($_SESSION['dadangnhap']) && $_SESSION['dadangnhap']):
            
    ?>
    <h1>Chao mung <?= $_SESSION['username_dadangnhap']?> da quay lai trang web</h1>
    <a href="dangxuat.php">Dang xuat</a>
    <?php else: ?>
    <form id="frmLogin" name="frmLogin" action="" method="post">
        Username: <input id="txtUsername" name = "txtUsername"/><br />
        Username: <input id="txtPassword" name = "txtPassword"/><br />
        <button id ="btnLogin" name="btnLogin">Login</button>
    </form>
    <?php endif; ?>
    <?php
        if(isset($_POST['btnLogin'])){
            $username=$_POST['txtUsername'];
            $password=$_POST['txtPassword'];
            if( $username == 'admin' &&  $password == '123456'){
                echo 'Dang nhap thanh cong';
                $_SESSION['dadangnhap'] = true;
                $_SESSION['username_dadangnhap'] = $username; 
            }
            else{
                echo 'Dang nhap that bai';
            }
            
        }
    ?>
</body>
</html>