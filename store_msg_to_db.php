<?php
include_once("./connection.php");

    // $message = htmlentities(mysqli_real_escape_string($conn, $_POST["msg"]));
    $message = $_POST["msg"];
    $incoming_msg_user = $_POST["incoming_msg_user"];
    $outgoing_msg_user = $_POST["outgoing_msg_user"];

    // echo "<script>console.log('".$incoming_msg_user."')</script>";

    $sql = "INSERT INTO `messages` (`msg_id`, `incoming_msg_user`, `outgoing_msg_user`, `msg`) VALUES (NULL, '$incoming_msg_user', '$outgoing_msg_user', '$message'); ";
    mysqli_query($conn, $sql) or die("Messege can't send");


?>