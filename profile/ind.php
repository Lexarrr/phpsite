<?php 
session_start();
// TODO: will do with BD

$userArray = [
    "ID"=> "1",
    "NAME"=> "Tony"
];

$_SESSION["user"] = $userArray;

if (isset($_SESSION["user"])){
    echo $_SESSION["user"]["NAME"] . ", you already in";
} else {
    echo "You do not sing in";
}
?>