<?php
include("connection.php");

if (isset($_POST["signup_btn"])) {
    $name = htmlentities(mysqli_real_escape_string($conn, $_POST["name"]));
    $username = htmlentities(mysqli_real_escape_string($conn, $_POST["username"]));
    $email = htmlentities(mysqli_real_escape_string($conn, $_POST["email"]));
    $bio = htmlentities(mysqli_real_escape_string($conn, $_POST["bio"]));
    $password = htmlentities(mysqli_real_escape_string($conn, $_POST["password"]));
    $confirm_password = htmlentities(mysqli_real_escape_string($conn, $_POST["confirm_password"]));
    $gender = htmlentities(mysqli_real_escape_string($conn, $_POST["gender"]));
    
    if($password !== $confirm_password){
        header("Location: sign_up.php?msg=Sorry, Password Not Matched!");
        exit();
    }
    $password = password_hash("$password", PASSWORD_DEFAULT);
    
    $target_file = $_FILES["profile_pic"]["name"];
    $image_tmp_name = $_FILES["profile_pic"]["tmp_name"];
    $imageFileExt = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $profile_pic = "./images/" . $username . "." . $imageFileExt;

    if (
        $imageFileExt != "jpg" && $imageFileExt != "png" && $imageFileExt != "jpeg"
        && $imageFileExt != "gif"
    ) {
        header("Location: sign_up.php?msg=Sorry, only JPG, JPEG, PNG and GIF files are allowed");
        exit();
    }

    move_uploaded_file($image_tmp_name, $profile_pic);



    $q = "SELECT * FROM users WHERE username = '$username'";
    $check_email = mysqli_query($conn, $q);
    $check = mysqli_num_rows($check_email);

    if ($check > 0) {
        $check = 20000;
        // header("Location: sign_up.php?msg=This username is already taken");  //this line and next line are same...
        echo "<script>window.open('sign_up.php?msg=This username is already taken','_self')</script>"; //this line and upper line are same...
        exit();
    }

    $q = "INSERT INTO `users` (`id`, `username`, `name`, `email`, `password`, `gender`, `profile_pic`, `bio`) VALUES (NULL, '$username', '$name', '$email', '$password', '$gender', '$profile_pic', '$bio') ";
    if (mysqli_query($conn, $q)) {
        // echo "<script>alert('Congratulation $name, your account has been created successfully')</script>";
        // echo "<script>window.open('index.php','_self')</script>";
        header("Location: index.php?msg=Congratulation $name, your account has been created successfully");
    } else {
        echo "<script>alert('Sorry! Account not create. Please try again!')</script>";
        echo "<script>window.open('sign_up.php','_self')</script>";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <title>Sign Up</title>
</head>

<body>
    <h2 class="pacifico_font">Registration to DIU Chat Space</h2>
    <div class="container container2">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <h1>Sign Up Form</h1>

                <?php
                if (isset($_GET["msg"])) {
                    $msg = $_GET["msg"];
                    echo '<br><div class="alert alert-danger" role="alert">' . $msg . '</div>';
                }
                ?>


                <form method="post" enctype="multipart/form-data">
                    <div class="mb-3 ">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Your Full Name" required>
                    </div>
                    <div class="mb-3 ">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                    </div>
                    <div class="mb-3 ">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="someone@domain.com" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="mb-3">
                        <label for="confirm_password" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Reenter Password" onkeyup="validate_password()" required>
                    </div><span id="wrong_pass_alert"></span>

                    <div class="mb-3 ">
                        <label for="name" class="form-label">Bio</label>
                        <input type="text" class="form-control" id="bio" name="bio" placeholder="Write somthing about you" required>
                    </div>

                    <div class="form-check" required>
                        <input class="form-check-input" type="radio" name="gender" id="male" value="Male" checked>
                        <label class="form-check-label" for="male">Male</label> <br>

                        <input class="form-check-input" type="radio" name="gender" id="female" value="Female">
                        <label class="form-check-label" for="female">Female</label>
                    </div>
                    <br>
                    <div class="form-group">
                        <input class="form-control" type="file" name="profile_pic" accept=".jpg, .png, .jpeg, .gif" value="">Upload your profile picture</input>
                    </div>
                    <br>
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <button id="create" class="btn btn-dark" type="submit" , name="signup_btn">Sign Up</button>
                    </div>
                </form>
                <br>
                <p style="text-align: center;">Already have an account? <a href="./index.php">Sign In</a></p>
            </div>
        </div>
    </div>

    <footer class="footer mt-auto py-3 bg-light">
        <div class="container">
            <span class="text-muted">Created by Md. Ashiqur Rahman <a href="https://github.com/mdashik123456" target="_blank"><img class="footerImage" src="./images/github_icon.png" alt="GitHub"></a></span>
        </div>
    </footer>

    <script>
        function validate_password() {

            var pass = document.getElementById('password').value;
            var confirm_pass = document.getElementById('confirm_password').value;
            if (pass != confirm_pass) {
                document.getElementById('wrong_pass_alert').style.color = 'red';
                document.getElementById('wrong_pass_alert').innerHTML = '☒ Password Not Matched';
                document.getElementById('create').disabled = true;
                document.getElementById('create').style.opacity = (0.4);
            } else {
                document.getElementById('wrong_pass_alert').style.color = 'green';
                document.getElementById('wrong_pass_alert').innerHTML =
                    '🗹 Password Matched';
                document.getElementById('create').disabled = false;
                document.getElementById('create').style.opacity = (1);
            }
        }
    </script>


</body>

</html>