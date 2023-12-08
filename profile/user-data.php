<?php
// session_start();
// // TODO: will do with BD

// $userArray = [
//     "ID"=> "1",
//     "NAME"=> "Tony"

// ];

// $_SESSION["user"] = $userArray;

// if (isset($_SESSION["user"])){
//     echo $_SESSION["user"]["NAME"] . ", you already in";
// } else {
//     echo "You do not sing in";
// }


// $userID = "1";
// $userName = "Tom";
// $userEmail = "123@gmail.com";
// $userLevel = "2";
// $userPass = "";


require_once("config/connect.php");

$qResult = true;

$email = htmlspecialchars(trim($_POST["userEmail"]));

$query = mysqli_query($link, "SELECT * FROM users WHERE EMAIL='" . mysqli_real_escape_string($link, $email) . "'");
if (mysqli_num_rows($query) == 0) {
    $qResult = false;
} else {
    $userdata = mysqli_fetch_assoc($query);
    $userID = $userdata["ID"];
    $userName = $userdata["NAME"];
    $userEmail = $userdata["EMAIL"]; // логин
    $userLevel = $userdata["LEVEL"]; // сделаем пока админом
    $userPass = $userdata["PASS"];
}
?>