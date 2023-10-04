<?php
session_start();
include_once("./connection.php");

$incoming_msg_user = $_POST["incoming_msg_user"];
$outgoing_msg_user = $_POST["outgoing_msg_user"];

$sql = "SELECT * FROM `messages`
                WHERE (`outgoing_msg_user` = '{$outgoing_msg_user}' AND `incoming_msg_user` = '{$incoming_msg_user}')
                OR (`outgoing_msg_user` = '{$incoming_msg_user}' AND `incoming_msg_user` = '{$outgoing_msg_user}')";
$result = mysqli_query($conn, $sql);

$current_chat_row = mysqli_num_rows($result);

if($current_chat_row != $_POST["current_chat_row"]){
    echo "0 ".$current_chat_row."";
}
else{
    
    echo "1 ".$current_chat_row."";
}
