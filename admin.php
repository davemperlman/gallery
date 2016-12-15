<?php 
require_once 'config.php';
require_once 'class.user.php';
session_start();

if ( isset($_POST['log-in']) ) {
	$user     = $_POST['user'];
	$password = $_POST['password'];

	if ( User::validate_user($user, $password) == true ) {
		$_SESSION['user'] = serialize(new User($user, '1'));

	} else {
		echo "Not Valid";
	}
}

if( isset($_POST['upload']) ) {
	$_SESSION['user']->image_upload($_FILES['to-upload'], $_POST['caption']);
}


 ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="_css/style.css">
	<title>Gallery:admin</title>
</head>
<body>

	<?php if ( !isset($_SESSION['user'])): ?>
		<section id="login">
			<form action="" method="post">
				<label for="user">Username</label>
				<input type="text" required name="user" id="user">
				<label for="password">Password</label>
				<input type="password" required name="password" id="password">
				<button type="submit" name="log-in">Log In</button>
			</form>
		</section>
	<?php else: ?>
		<header>
			<nav>
			<h1>Gallery</h1>
				<ul class="nav-ul">
					<li><a href="index.php"><span>Home</span></a></li>
					<li><a href="admin.php"><span>Admin</span></a></li>
					<li><a href="logout.php"><span>Log Out</span></a></li>
				</ul>
			</nav>
		</header>
		<div class="container">
			<section id="upload">
				<form method="post" enctype="multipart/form-data">
					<label for="to-upload">Select an Image: </label>
					<input type="file" name="to-upload" id="to-upload">
					<label for="caption">Enter a Caption: </label>
					<input type="text" name="caption" id="caption">
					<button type="submit" name="upload">Upload Image</button>
				</form>
			</section>
		</div>
		<aside>
			
		</aside>
		<footer>
			
		</footer>
	<?php endif; ?>
</body>
</html>
