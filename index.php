<?php
session_start();
include_once("./connection.php");

if (isset($_SESSION["username"])) {
    header("Location: ./chat_space.php");
    exit();
}

if (isset($_POST['signin_btn'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $q = "SELECT * FROM `users` WHERE `username` = '$username';";
    $data = mysqli_query($conn, $q);

    if ($row = mysqli_fetch_assoc($data)) {

        if (password_verify($password, $row["password"])) {
            mysqli_query($conn, "UPDATE `users` SET `isLoggedIn` = 'Active Now' WHERE `username` = '$username' ");
            $_SESSION['username'] = $username;
            $_SESSION['name'] = $row["name"];
            $_SESSION['profile_pic'] = $row["profile_pic"];
            header("Location: ./chat_space.php");
            exit();
        } else {
            session_destroy();
            header("Location: ./index.php?msg=Username or Password Invalid");
            exit();
        }
    } else {
        session_destroy();
        header("Location: ./index.php?msg=Username or Password Invalid");
        exit();
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Poppins:wght@100&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <title>Login</title>
</head>

<body>
    <h2 class="pacifico_font">Welcome to DIU Chat Space</h2>
    <div class="container container2">


        <?php
        if (isset($_GET["msg"])) {
            $msg = $_GET["msg"];

            if ($msg === "Username or Password Invalid") {
                echo '<div class="alert alert-danger" role="alert">' . $msg . '</div>';
            } else {
                echo '<div class="alert alert-success" role="alert">' . $msg . '</div>';
            }
        }
        ?>

        <div class="row justify-content-center">
            <div class="col-md-4">
                <h1>Login</h1>
                <form action="#" method="post">
                    <div class="mb-3 ">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        <p style="margin-top:5px">Forget Password? <a href="#">Click Here</a></p>
                    </div>
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <button class="btn btn-dark" type="submit" name="signin_btn">Sign In</button>
                    </div>
                </form>
                <br>
                <p style="text-align: center;">Don't Have any account? <a href="./sign_up.php">Create One</a></p>
            </div>
        </div>
    </div>


    <footer class="footer mt-auto py-3 bg-light">
        <div class="container">
            <span class="text-muted">Created by Md. Ashiqur Rahman <a href="https://github.com/mdashik123456" target="_blank"><img class="footerImage" src="./images/github_icon.png" alt="GitHub"></a></span>
        </div>
    </footer>
</body>

</html>