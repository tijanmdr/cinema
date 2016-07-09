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
        	$bookCheck = $pdo->prepare('select * from hamrocinema.book where user_id=?');
            $movieCheck = $pdo->prepare('select * from hamrocinema.movies where movie_id=?');

            $cancelBooking = $pdo->prepare('delete from hamrocinema.book where book_id=?');

            $userDetails->execute([$sessionCheck]);

            while ($r1 = $userDetails->fetch()) {
                $userID = $r1['user_id'];

                $bookCheck->execute([$userID]);

                echo "<table class='table table-bordered'>";
                echo "<tr><th>Book ID</th><th>Movie Name</th><th>Actions</th></tr>";
                while ($r2 = $bookCheck->fetch()) {
                    $bookID = $r2['book_id'];
                    $movieID = $r2['movie_id'];

                    $movieCheck->execute([$movieID]);

                    while ($r3 = $movieCheck->fetch()) {
                        $movieName = $r3['name'];

                        echo "<tr><td>".$bookID."</td><td>".$movieName."</td><td><a href='?action=cancel&Bid=".$bookID."'"?> onclick="confirm('Are you sure you want to delete?');" <?php echo">Delete</a></td></tr>";
                    }
                }
                echo "</table>";
            }

            if ($_GET['action'] == 'cancel' && $_GET['Bid']) {
                $IDBooked = $_GET['Bid'];

                $cancelBooking->execute([$IDBooked]);
                header("Location: booking.php");
            }

        } else {
            echo "<h4>Login First</h4>";
        }
        ?>
        <?php include 'footer.php'; ?>
	</div>
</body>
</html>