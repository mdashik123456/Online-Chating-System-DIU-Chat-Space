<?php
    session_start();
    include_once ("./connection.php");

    if(isset($_GET['incoming_user'])){
        $incoming_user = $_GET['incoming_user'];
        $sql = "SELECT * FROM `messages` WHERE ";
        
    }


?>