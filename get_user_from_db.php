
<?php
session_start();
include_once("./connection.php");

$sql = "SELECT * FROM `users`";

$result = mysqli_query($conn, $sql);

$output = "";

while ($row = mysqli_fetch_assoc($result)) {
    if ($_SESSION["username"] !== $row["username"]) {
        $output .= "<tbody>
                <tr>
                    <td><a href='?incoming_user=".$row['username']."'><img src='".$row['profile_pic']."' class='img-thumbnail' style='height: 70px; width:70px;'></a></td>
                    <td><a class='user_link' href='?incoming_user=".$row['username']."'><p>" . $row["name"]. "<br>".$row["bio"]."</p></a></td>
                    <td><i id='active_status' class='fa-solid fa-circle fa-2xs'></i></td>
                </tr>
            </tbody>";
    }
}

echo $output;
?>