    <?php
session_start();
include('connect.php');
$msg= false;
if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST)){
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $user_re_password = $_POST['user_re_password'];
    if (!empty($user_name)&&!empty($user_email)&&!empty($user_password)&&!is_numeric($user_name)){
        {
            if($user_password === $user_re_password){
                $query = "insert into users(Username,Email,Password) VALUES('$user_name','$user_email','$user_password')";
                mysqli_query($con,$query);
                header("Location: login.php");
            }
            else{
                $msg = "Password is wrong";
            }
        }
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <h1>Music Website Login</h1>
<form method="post">
    <!-- Headings for the form -->
    <div class="headingsContainer">
        <h3>Sign up</h3>
        <p>Please enter your username and password to create account </p>
    </div>

    <!-- Main container for all inputs -->
    <div class="mainContainer">
        <!-- Username -->
        <label for="name">Username</label>
        <input type="text" placeholder="Enter your username" name="user_name" required>

        <label for="email">Email</label>
        <input type="email" placeholder="Enter your email" name="user_email" required>

        <!-- Password -->
        <label for="password">Password</label>
        <input type="password" placeholder="Enter your password" name="user_password" required>

        <label for="re_password">Re-password</label>
        <input type="password" placeholder="Enter your Re-password" name="user_re_password" required>
        <br>

        <!-- Submit button -->
         <button type="submit" value="Sign up",>Login</button>
        <input type="checkbox"name="" id=""> <span>Remember Me.</span>
        <!-- Sign up link -->
        <p class="register">You have a account?  <a href="login.php">Login!</a></p>
        <?php
        echo('<h3>'.$msg.'</h3>');
        ?>
    </div>

</form>
</body>
</html>