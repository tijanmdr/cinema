<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div>
      <ul class="nav navbar-nav navbar-right">
        <?php if ($sessionCheck == "") { ?>
        	<li><a href="/hamrocinema/">Home</a></li>
	        <li><a href="/hamrocinema/about.php">About</a></li>
	        <li><a href="/hamrocinema/login.php">Login</a></li>
        <?php } else if ($sessionCheck != "") { ?>
        <li><a href="/hamrocinema/">Home</a></li>
        <li><a href="/hamrocinema/dashboard.php">Dashboard</a></li>
        <li><a href="/hamrocinema/about.php">About</a></li>
        <li><a href="/hamrocinema/logout.php">Logout</a></li>
      </ul>
      <?php } ?>
    </div>
  </div>
</nav>