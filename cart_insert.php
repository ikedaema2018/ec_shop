<?php
session_start();
$item_id = $_GET["id"];
include("funcs.php");
  loginCheck();
  $pdo = nagiConnect();
  $stmt = $pdo->prepare("SELECT * FROM shop_table WHERE id = :id");
  $stmt->bindValue(':id', $item_id, PDO::PARAM_INT);
  $status = $stmt->execute();
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  $_SESSION["item"][$_SESSION["count"]] = $result["title"];
  $_SESSION["amount"][$_SESSION["count"]] = $result["price"];
  $_SESSION["shouhinh_id"][$_SESSION["count"]] = $result["id"];
  $_SESSION["image_url"][$_SESSION["count"]] = $result["image"]; 
  $_SESSION["count"] += 1;
  header("Location: shop_list.php");
  // echo $result["price"];
  // echo $result["title"];
?>