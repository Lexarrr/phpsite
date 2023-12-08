<?php 
include("asserts/functions.php"); 
$pos = (int) $_GET["pos"];
$title = "Delete position #{$pos}";
$m = get_menu($menu);
if(isset($_SESSION["BASKET"]) && array_key_exists($pos, $_SESSION["BASKET"])){
    $item = $_SESSION["BASKET"][$pos]["NAME"];
    unset($_SESSION["BASKET"][$pos]);
    $content = "<h2>Position {$pos} deleted<h2/>";
    header("refresh: 2, url=basket.php");
} else {
    header("Location: basket.php");
}

include("asserts/design.php");

?>