<?php 
	$hostname = "localhost"; // Address to MySQL database
	$username = "root"; // Username to access database
	$password = ""; // Password to access database
	$database = "hamrocinema"; // Database name
	$charset = 'utf8'; // Charset (Optional)

	$dsn = "mysql: host=$hostname; dbname = $database; charset = $charset"; //Connection PDO with MySQL driver
	$opt = [
		PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,
		PDO::ATTR_EMULATE_PREPARES=>false,
	]; // Optional

	$pdo = new PDO($dsn, $username,$password,$opt); // Connection to database
?>