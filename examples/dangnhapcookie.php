<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập cookie</title>
</head>
<body>
    <?php if(isset($_COOKIE['is_logged'])): ?>
        Dang nhaap roi
        quyenve trang chur <a href="/">ve tran chu</a>
    <?php else: ?>
    <form id="frmLogin" name="frmLogin" action="" method="post">
        Username: <input id="txtUsername" name = "txtUsername"/><br />
        password: <input id="txtPassword" name = "txtPassword"/><br />
        <input type="checkbox" id ="rememberme" name ="rememberme" value="1">Ghi nhớ đăng nhập</input> <br />
        <button id ="btnLogin" name="btnLogin">Login</button>
    </form>
    <?php endif; ?>
    <?php 
        if(isset($_COOKIE['btnLogin'])){
            $username = $_POST['txtUsername'];
            $password = $_POST['txtPassword'];
            $rememberme = isset($_POST['rememberme']) ? $_POST['rememberme'] : '0';
            
            if($username = 'admin' && $password = '123456'){
                if($rememberme == 1){
                    setcookie('is_logged', true, time()+ 3600, '/');
                }
                echo 'dang nhap thanh cong';
            }
            else {
                echo "Đăng nhập thất bại!";
        }
    }
    ?>
</body>
</html>