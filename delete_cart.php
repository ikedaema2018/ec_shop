<?php
$id = $_GET["id"];
session_start();
unset($_SESSION["item"][$id]);
$_SESSION["item"] = array_merge($_SESSION["item"]);
unset($_SESSION["amount"][$id]);
$_SESSION["amount"] = array_merge($_SESSION["amount"]);
unset($_SESSION["image_url"][$id]);
$_SESSION["image_url"] = array_merge($_SESSION["image_url"]);
$_SESSION["count"]-=1;
header("Location: cart_view.php")
?>