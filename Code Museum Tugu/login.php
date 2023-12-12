<?php

include 'config.php';

session_start();


if (isset($_SESSION['Username'])) {
    header("Location: admin1.php");
}

if (isset($_POST['submit'])) {
	$Email = $_POST['Email'];
	$Password = md5($_POST['Password']);
	$sql = mysqli_query($conn,"SELECT * FROM pengguna WHERE Username='$Username' AND Password='$Password'")or die('query failed');
		$row = mysqli_fetch_assoc($sql);
		$_SESSION['Username'] = $row['Id'];
		header("Location: admin1.php");
	
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="style.css">

	<title>E-Agrotis</title>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
			<div class="input-group">
				<input type="text" placeholder="Username" name="Email">
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="Password">
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Login</button>
			</div>

		</form>
	</div>
</body>
</html>
