<?php 
require_once("config/connect.php");

$qResult = true;

$address = htmlspecialchars(trim($_POST["userAddress"]));

$query = mysqli_query($link, "SELECT 'NAME', EMAIL FROM orders WHERE ADDRESS='" . mysqli_real_escape_string($link, $address) . "'");
if (mysqli_num_rows($query) == 0) {
    $qResult = false;
} else {


    $orderdata = mysqli_fetch_assoc($query);
    $orderID = $orderdata["ID"];
    $userName = $orderdata["NAME"];
    $userEmail = $orderdata["EMAIL"];
    $userAddress = $orderdata["ADDRESS"]; 
    $total = $orderdata["SUMM"];
}

?>