<?php
    include 'config.php';
    error_reporting(0);
    session_start();

    if(isset($_POST['submit'])){
        $userName = $_POST['userName'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $confirmPassword = md5($_POST['confirmPassword']);

        if($password == $confirmPassword) {
            $sql = "SELECT * FROM users WHERE email='$email'";
            $result = mysqli_query($conn, $sql);
            if (!$result->num_rows > 0){
                $sql = "INSERT INTO users (username, email, password)
                        VALUES('$userName', '$email', '$password')";
                $result = mysqli_query($conn,$sql);
                if($result){
                    echo "<script>alert('Registration Succcessfull')</script>";
                    $userName = "";
                    $email = "";
                    $_POST['password'] = "";
                    $_POST['confirmPassword'] = "";
                }else{
                    echo "<script>alert('somthing wrong')</script>";
                }    
            } else {
                echo "<script>alert('Woops! Email Already Exists.')</script>";
            }  
        }else{
            echo "<script>alert('Password Not Mached')</script>";
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

        <title> Register form</title>
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
            <form action="index.php" method="POST" class="loginEmail">
                <p class="loginText">Register</p>
                <div class="inputGroup">
                    <input type="text" placeholder="Username" name="userName" value="<?php echo $userName; ?>" required>
                </div>
                <div class="inputGroup">
                    <input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
                </div>
                <div class="inputGroup">
                    <input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
                </div>
                <div class="inputGroup">
                    <input type="password" placeholder="Confirm Password" name="confirmPassword" value="<?php echo $_POST['confirmPassword']; ?>" required>
                </div>
                <div class="inputGroup">
                    <button name="submit" class="loginButton">Register</button>
                </div>
                <p class = "loginRegisterText">Have an account? <a href="index.php">Login Here</a>.</p>
            </form>

        </div>
    </body>
</html>