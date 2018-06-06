<?php

if (
  strlen($_POST["user_id"]) > 12 ||
  strlen($_POST["pass"]) > 16 ||
  strlen($_POST["address"]) > 100 
) {
    exit('文字数が長いです。');
}

class User {
  public $user_id;
  public $pass;
  public $tttime;
  public $address;
}

$user = new User;
$user->user_id = $_POST["user_id"];
$user->pass = $_POST["pass"];
$user->address = $_POST["address"];
$timestamp = time() ;
 
// date()で日時を出力
$tttime = date( "Y/m/d H:i:s" , $timestamp ) ;
$user->tttime = $tttime;
?>





<?php
include("funcs.php");
$pdo = nagiConnect();

$stmt = $pdo->prepare("INSERT INTO user_table(id, user_id, pass, address, timestamp, kanri_flag)VALUES(NULL, :user_id, :pass, :address, :timestamp, :address )");

$stmt->bindValue(':user_id', $user->user_id, PDO::PARAM_STR);
$stmt->bindValue(':pass', $user->pass, PDO::PARAM_STR);
$stmt->bindValue(':timestamp', $user->tttime, PDO::PARAM_STR);
$stmt->bindValue(':address', $user->address, PDO::PARAM_STR);

$status = $stmt->execute();

if($status==false){
  $error = $stmt->errorinfo();
  exit("QueryError: ".$error[2]);
}else{
  header("Location: login.php");
}
?>