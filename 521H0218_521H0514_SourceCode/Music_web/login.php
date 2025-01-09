<?php
$msg = false;
session_start();
include('connect.php');
if (isset($_POST['user_name'])) {
    $user_name = $_POST['user_name'];
    $user_password = $_POST['password'];
    $query = "select * from users where Username ='" . $user_name . "'AND Password='" . $user_password . "'";

    $result = mysqli_query($con, $query);
    if($user_name==="admin" && $user_password==="123456789"){
        header('Location: admin_dashboard.php');
    }
    if (mysqli_num_rows($result) === 1) {
        $query2 = "insert into active(user) value ('$user_name')";
        $result2 = mysqli_query($con, $query2);
        header('Location: playlist.php');
    } else {
        $msg = "Incorect Password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page in HTML</title>
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <h1>Music Website Login</h1>
    <form method="post">
        <!-- Headings for the form -->
        <div class="headingsContainer">
            <h3>Sign in</h3>
            <p>Sign in with your username and password</p>
        </div>

        <!-- Main container for all inputs -->
        <div class="mainContainer">
            <!-- Username -->
            <label for="name">Your username</label>
            <input type="text" placeholder="Enter Username" name="user_name" required>

            <br><br>

            <!-- Password -->
            <label for="password">Your password</label>
            <input type="password" placeholder="Enter Password" name="password" required>

            <br>

            <!-- Submit button -->
            <button type="submit" value="Login" ,>Login</button>
            <input type="checkbox" name="" id=""> <span>Remember Me.</span>
            <!-- Sign up link -->
            <p class="register">Don't have a account yet? <a href="signup.php">Sign up!</a></p>
            <?php
            echo ('<h3>' . $msg . '</h3>');
            ?>
        </div>

    </form>
</body>

</html>