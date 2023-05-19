<?php
//This script will handle login
session_start();

// check if the user is already logged in
if (isset($_SESSION['username'])) {
    header("location: index.php");
    exit;
}
require_once "connect.php";

$username = $password = "";
$err = "";

// if request method is post
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (empty(trim($_POST['username'])) || empty(trim($_POST['password']))) {
        $err = "Please enter username + password";
    } else {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
    }


    if (empty($err)) {
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $param_username);
        $param_username = $username;


        // Try to execute this statement
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_store_result($stmt);
            if (mysqli_stmt_num_rows($stmt) == 1) {
                mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                if (mysqli_stmt_fetch($stmt)) {
                    if (password_verify($password, $hashed_password)) {
                        // this means the password is correct. Allow user to login
                        session_start();
                        $_SESSION["username"] = $username;
                        $_SESSION["id"] = $id;
                        $_SESSION["loggedin"] = true;

                        //Redirect user to welcome page
                        if ($_SESSION["username"] == 'admin') {
                            header("location: admin.php");
                        } else {
                            header("location: index.php");
                        }
                    }
                }
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
    <link rel="stylesheet" href="style1.css">
    <script src="https://kit.fontawesome.com/8923084387.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="shortcut icon" type="image/png" href="images/logo.png">
    <title>Furniture Webstore | Log in</title>
</head>

<body>
    <!-- <button><a href="/signin.html" target="_blank">click here</a></button> -->
    <section>
        <h1 class="chatbook-heading">Furniture Webstore</h1>
        <div class="container">
            <div>
                <h2 class="login-header">
                    Log in to Explore more!
                    </h1>
            </div>
            <form action="" method="post">
                <div>
                    <div class="username">
                        Username : <input name="username" class="txt" type="text">
                    </div>
                    <div class="password">
                        password : <input name="password" class="pass" type="password">
                    </div>
                </div>
                <button class="login-btn" type="submit">Log in</button>
                <div class="xtra">
                    <a href="#">forgot password?</a>
                    <a href="register.php">Create new Account</a>
                </div>
            </form>
        </div>
    </section>
</body>



</html>