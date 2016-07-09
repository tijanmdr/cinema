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
    <?php
    if (session_destroy()) {
        header("Location: /hamrocinema/");
    }
    ?>
</body>
</html>