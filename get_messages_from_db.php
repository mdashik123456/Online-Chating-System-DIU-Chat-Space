<?php
session_start();
include_once("./connection.php");

$incoming_msg_user = $_POST["incoming_msg_user"];
$outgoing_msg_user = $_POST["outgoing_msg_user"];

// $sql = "SELECT * FROM `messages` WHERE `incoming_msg_user` = '$incoming_msg_user' AND `outgoing_msg_user` = '$outgoing_msg_user'";
$sql = "SELECT * FROM `messages`
                WHERE (`outgoing_msg_user` = '{$outgoing_msg_user}' AND `incoming_msg_user` = '{$incoming_msg_user}')
                OR (`outgoing_msg_user` = '{$incoming_msg_user}' AND `incoming_msg_user` = '{$outgoing_msg_user}')";
$result = mysqli_query($conn, $sql);

$output = "";
// $output = "<script>console.log('".$incoming_msg_user."');</script>";

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        if ($_SESSION["username"] === $row["outgoing_msg_user"]) {
            $output .= "<div class='message user-message'>
                        <p>" . $row["msg"] . "</p>
                    </div>";
        } elseif($_SESSION["username"] === $row["incoming_msg_user"]) {
            $output .= "<div class='message other-message'>
                        <p>" . $row["msg"] . "</p>
                    </div>";
        }
    }
} else{
    $output .= "<center><strong>Sorry No Masage available</strong></center>";
}

echo $output;
