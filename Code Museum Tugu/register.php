<?php

include 'config.php';

error_reporting(0);

session_start();

if (isset($_SESSION['Username'])) {
    header("Location: login.php");
}

if (isset($_POST['submit'])) {
	$Username = $_POST['Username'];
	$Password = md5($_POST['Password']);
	$cPassword = md5($_POST['cPassword']);

	if ($Password == $cPassword) {
		$sql = "SELECT * FROM pengguna WHERE Email='$Email'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO pengguna (Username, Email, Password)
					VALUES ('$Username', '$Email', '$Password')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('Wow! User Registration Completed.')</script>";
				$Username = "";
				$Email = "";
				$_POST['Password'] = "";
				$_POST['cPassword'] = "";
				
			} else {
				echo "<script>alert('Something Wrong Went.')</script>";
			}
		} else {
			echo "<script>alert('Email Already Exists.')</script>";
		}

	} else {
		echo "<script>alert('Password Not Matched.')</script>";
	}
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
<body  style="background-image: 2.jpg;">
	<div class="container">
		<form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
			<div class="input-group">
				<input type="text" placeholder="Username" name="Username" value="<?php echo $Username; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="Password" value="<?php echo $_POST['Password']; ?>" required>
            </div>
            <div class="input-group">
				<input type="password" placeholder="Confirm Password" name="cPassword" value="<?php echo $_POST['cPassword']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Register</button>
			</div>
			<p class="login-register-text">Have an account? <a href="login.php">Login Here</a>.</p>
		</form>
	</div>
</body>
</html>
