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

        <h1 class="title movieDivTitle">Hamro Cinema</h1><hr>
        <div class="movieDiv col-md-12">
			<h3 class="movieDivTitle">Now Showing</h3>
			<?php
			$movieQuery = $pdo->prepare('select * from hamrocinema.movies where status=?');
			$movieQuery->execute([1]);
			
			while ($row = $movieQuery->fetch()) {
			?>
			<div class="col-md-3 movieThumb">
				<img src="image/<?php echo $row['image']; ?>" class="img img-responsive">
				<span class="titleMovie col-md-12"><em><?php echo $row['name']; ?></em></span>
				<a class="bookButton btn btn-default col-md-12" href="book.php?mid=<?php echo $row['movie_id']; ?>" onclick="confirm('Book this show?')">Book This Show</a>
			</div>
			<?php
			}
			?>
		</div>
		<div class="clear"></div>
		<hr>
		<div class="movieDiv col-md-12">
			<h3 class="movieDivTitle">Coming Soon</h3>
			<?php
			$movieQuery->execute([2]);

			while ($row = $movieQuery->fetch()) {
			?>
			<div class="col-md-3 movieThumb">
				<img src="image/<?php echo $row['image']; ?>" class="img img-responsive">
				<span class="titleMovie col-md-12"><em><?php echo $row['name']; ?></em></span>
			</div>
			<?php
			}
			?>
		</div>
		<div class="clear"></div>

		<?php include 'footer.php'; ?>
    </div>
</body>
</html>