<?php 

include 'config.php';
error_reporting(0);
session_start();


if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['username'];
		header("Location: home.php");
	} else {
		echo "<script>alert('Email or Password is Wrong.')</script>";
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

        <title> loging form</title>
    </head>

    <body>
        <div class="container">
            <!--<p class="loginText">Login With Social Media</p>
            <div class="loginWithSocial">
                <a href="#" class="apple"><i class="fa fa-apple"></i>Apple</a>
                <a href="#" class="google"><i class="fa fa-google"></i>Google</a>
                <a href="#" class="facebook"><i class="fa fa-facebook"></i>Facebook</a>
                <a href="#" class="instagram"><i class="fa fa-instagram"></i>Instagram</a>
            </div>-->
            <form action="http://localhost/Web/index.php" method="POST" class="loginEmail">
                <p class="loginText">Login</p>
                <div class="inputGroup">
                    <input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
                </div>
                <div class="inputGroup">
                    <input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password'];?>" required>
                </div>
                <div class="inputGroup">
                    <button name="submit" class="loginButton">Login</button>
                </div>
                <p class = "loginRegisterText">Don't have an account? <a href="register.php">Register Here</a>.</p>
            </form>
        </div>
    </body>
</html>