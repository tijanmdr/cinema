<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include 'include.php';
?>
<head>
    <meta charset="UTF-8">
    <title>Hamro Cinema</title>
    <link rel="stylesheet" type="text/css" href="style/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body>
    <div class="container-fluid">
        <?php include 'menu.php'; ?>
        <h1>Login</h1><hr>
        <div class="col-md-6">
            <form action="" method="POST">
                <label>Email: </label><br>
                <input type="text" name="email" placeholder="Enter Email" class="form-control"><br>
                <label>Password: </label><br>
                <input type="password" name="password" placeholder="Enter Password" class="form-control"><br>
                <input type="submit" value="Login" name="login" class="form-control btn btn-danger">
            </form>
        </div>
        <?php
            if (isset($_POST['login'])) {
                $email = $_POST['email'];
                $password = $_POST['password'];

                $login = $pdo->prepare('select * from hamrocinema.user where email=? and password=?');
                $login->execute([$email, $password]);

                $loginRow = $login->rowCount();

                if ($loginRow == 1) {
                    $_SESSION['sessionUserEmailHamro'] = $email;
                    header('Location: dashboard.php');
                }
            }
        ?>
        <div class="clear"></div>
        <?php include 'footer.php'; ?>
    </div>
</body>
</html>