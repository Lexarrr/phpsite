<?php 
include("asserts/functions.php"); 
$title = "Обратная связь";
$m = get_menu($menu);
$content = fbForm();
include("asserts/design.php");
?>