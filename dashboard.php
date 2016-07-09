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
            $userDetails = $pdo->prepare('select * from hamrocinema.user where email=?');
            $userDetails->execute([$sessionCheck]);

            while ($row = $userDetails->fetch()) {
            ?>
            <h2><?php echo $row['name'] ?></h2>
            <h3><?php echo $row['phone_no'] ?></h3>
            <h3><a href="mailto:<?php echo $row['email'] ?>"><?php echo $row['email'] ?></a></h3>
            <div><a href="booking.php">View Booked Shows</a></div>
            <?php
            }
        } else {
            echo "<h4>Login First</h4>";
        }
        ?>
        <?php include 'footer.php'; ?>
    </div>
</body>
</html>