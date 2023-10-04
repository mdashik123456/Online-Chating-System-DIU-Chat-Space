<?php
include_once("./connection.php");

$incoming_msg_user = "ashik";
$outgoing_msg_user = "abdullah";

$sql = "SELECT * FROM `messages`
                WHERE (`outgoing_msg_user` = '{$outgoing_msg_user}' AND `incoming_msg_user` = '{$incoming_msg_user}')
                OR (`outgoing_msg_user` = '{$incoming_msg_user}' AND `incoming_msg_user` = '{$outgoing_msg_user}')";
$result = mysqli_query($conn, $sql);

// $result = mysqli_fetch_assoc($result);

$row = mysqli_fetch_all($result);
print_r($row);

