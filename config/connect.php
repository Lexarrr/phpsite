<?php 
require_once("db_set.php");

$link = mysqli_connect(SERVER_NAME, USERNAME, "", DATABASE);

if(!$link){
    die("connection failed". mysqli_connect_error());
}
?>