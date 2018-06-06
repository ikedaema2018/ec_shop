<?php

if (
  strlen($_POST["user_id"]) > 12 ||
  strlen($_POST["pass"]) > 16 
) {
    exit('文字数が長いです。');
}

class User {
  public $user_id;
  public $pass;
  public $tttime;
}

$user = new User;
$user->user_id = $_POST["user_id"];
$user->pass = $_POST["pass"];
$timestamp = time() ;
 
// date()で日時を出力
$tttime = date( "Y/m/d H:i:s" , $timestamp ) ;
$user->tttime = $tttime;
?>





<?php
include("funcs.php");
$pdo = nagiConnect();

$stmt = $pdo->prepare("INSERT INTO user_table(id, user_id, pass, timestamp)VALUES(NULL, :user_id, :pass, :timestamp)");

$stmt->bindValue(':user_id', $user->user_id, PDO::PARAM_STR);
$stmt->bindValue(':pass', $user->pass, PDO::PARAM_STR);
$stmt->bindValue(':timestamp', $user->tttime, PDO::PARAM_STR);


$status = $stmt->execute();

if($status==false){
  $error = $stmt->errorinfo();
  exit("QueryError: ".$error[2]);
}else{
  header("Location: login.php");
}
?>