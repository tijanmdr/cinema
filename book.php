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
        <?php
        include 'menu.php';
        if ($sessionCheck != "") {
        	$movieID = $_GET['mid'];

        	$userCheck = $pdo->prepare('select * from hamrocinema.user where email=?');
        	$bookMovie = $pdo->prepare('insert into hamrocinema.book(user_id, movie_id) values(?,?)');

        	$userCheck->execute([$sessionCheck]);

        	while ($r1 = $userCheck->fetch()) {
        		$userID = $r1['user_id'];

        		$bookMovie->execute([$userID, $movieID]);

                if ($bookMovie) {
                    header("Location: dashboard.php");
                }
        	}
        } else {
            echo "<h4>Login First</h4>";
        }
        ?>

        <?php include 'footer.php'; ?>
	</div>
</body>
</html>