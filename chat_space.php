<?php
session_start();
include_once("./connection.php");

function log_out()
{
    session_unset();
    session_destroy();
    header("Location: ./index.php");
    exit();
}

if (!isset($_SESSION['username'])) {
    log_out();
}


if (isset($_POST['logout_btn'])) {
    $username = $_SESSION['username'];
    mysqli_query($conn, "UPDATE `users` SET `isLoggedIn` = 'no' WHERE `username` = '$username' ");
    log_out();
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
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Poppins:wght@100&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style_chat_space.css">

    <title>Chat Space</title>
</head>

<body>

    <div class="container-fluid	">
        <div class="row">
            <div class="col-md-4 container2">

                <div class="row">
                    <div class="col-2">
                        <div>
                            <form action="" method="post">
                                <button class="btn btn-dark" type="submit" name='logout_btn'>Logout</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-8">
                        <center>
                            <div class="content">
                                <img id="profile_pic" src="<?php echo $_SESSION['profile_pic']; ?>"
                                    alt="Profile Picture">
                                <div class="details">
                                    <span>
                                        <?php echo $_SESSION['name'];
                                        //echo $_SESSION['profile_pic']; ?>
                                    </span>
                                    <p>Active Now &nbsp;<i id="active_status" class="fa-solid fa-circle fa-2xs"></i></p>
                                </div>

                                <div class="search">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Enter Name to Search User"
                                            aria-label="Recipient's username" aria-describedby="button-addon2">
                                        <button class="btn btn-secondary" type="button" id="button-addon2"><i
                                                class="fa-solid fa-magnifying-glass"></i></button>
                                    </div>
                                </div>
                            </div>
                        </center>
                    </div>

                </div>

                <div class="container">
                    <div class="userlist">

                        <!-- uaer list -->

                        <table class="table" id="user_list_table">
                            <tbody>
                                <tr>
                                    <td><img src="./images/profile.PNG" class="img-thumbnail" style="height: 70px; width:70px;"></td>
                                    <td><p> Sazzad Hossain <br>No Messege Available</p></td>
                                    <td><i id="active_status" class="fa-solid fa-circle fa-2xs"></i></td>
                                </tr>
                            </tbody>
                        </table>


                        <!-- uaer list -->


                    </div>
                </div>
            </div>

            <div class="col-md-8 container2">


                <div class="container chat-container">

                    <p class="text-center"><img src="./images/profile.PNG" class="img-thumbnail"
                            style="height: 70px; width:70px;"></p>
                    <p class="text-center">Sazzad Hossain (sazzad65)</p>
                    <p class="text-center">Active Now &nbsp;<i id="active_status" class="fa-solid fa-circle fa-2xs"></i>
                    </p>
                    <div class="chat-list">

                        <div class="message-container">


                            <!-- Add more messages here -->
                            <div class="message other-message">
                                <p>Hello, how are you?</p>
                            </div>

                            <div class="message user-message">
                                <p>I'm doing great! Thanks for asking.</p>
                            </div>
                            <!-- Add more messages here -->


                        </div>


                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Type Messege to Send"
                            aria-label="Recipient's username" aria-describedby="button-addon2">
                        <button class="btn btn-dark" type="button" id="button-addon2"><i
                                class="fa-solid fa-paper-plane"></i></button>
                    </div>
                </div>






            </div>


        </div>

    </div>


    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>


    <script>
        function fetchData() {
            $.ajax({
                url: 'fetch_data.php', // Replace with the actual URL of your PHP script
                dataType: 'json',
                success: function (data) {
                    // Clear existing data
                    $('#user_list_table').empty();

                    
                },
                complete: function () {
                    // Schedule the next data fetch after a delay (e.g., every 5 seconds)
                    setTimeout(fetchData, 5000);
                }
            });
        }

        // Initial data fetch
        fetchData();
    </script>


    <footer class="footer mt-auto py-3 bg-light">
        <div class="container">
            <span class="text-muted">Created by Md. Ashiqur Rahman <a href="https://github.com/mdashik123456"
                    target="_blank"><img class="footerImage" src="./images/github_icon.png" alt="GitHub"></a></span>
        </div>
    </footer>
</body>

</html>