
<?php
session_start();
include_once("./connection.php");

$search_user_box = $_POST["search_user_box"];
$sql = "SELECT * FROM `users` WHERE `name` LIKE '%".$search_user_box."%' OR `username` LIKE '%".$search_user_box."%'";

$result = mysqli_query($conn, $sql);

$output = "";

while ($row = mysqli_fetch_assoc($result)) {
    if ($_SESSION["username"] !== $row["username"] && "" !== $row["username"] && "Sorry, no user found!" !== $row["name"]) {
        if($row["isLoggedIn"] === "Active Now"){
            $isLoggedIn = "<i id='active_status'class='fa-solid fa-circle fa-2xs'></i>";
        }
        else{
            $isLoggedIn =  "<i id='active_status'class='fa-regular fa-circle fa-2xs'></i>";
        }
        $output .= "<tbody>
                <tr>
                    <td><a href='?incoming_user=".$row['username']."' onclick='loadMessages()'><img src='".$row['profile_pic']."' class='img-thumbnail' style='height: 70px; width:70px;'></a></td>
                    <td><a href='?incoming_user=".$row['username']."' onclick='loadMessages()'><p>" . $row["name"]. "<br><i>".$row["bio"]."</i></p></a></td>
                    <td>".$isLoggedIn."</td>
                </tr>
            </tbody>";
    }
}

echo $output;
?>