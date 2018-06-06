<?php


//ユーザーデータベースへの接続
// function nagiConnect() {
//   try {
//     $pdo = new PDO('mysql:dbname=ikedaema0817_funclub;charset=utf8;host=mysql718.db.sakura.ne.jp','ikedaema0817','pass1234');
//   } catch (PDOException $e) {
//     exit('DbConnectError:'.$e->getMessage());
//   } return $pdo;
// }

function nagiConnect() {
  try {
    $pdo = new PDO('mysql:dbname=ikedaema0817_ec_db;charset=utf8;host=mysql718.db.sakura.ne.jp','ikedaema0817','pass1234');
  } catch (PDOException $e) {
    exit('DbConnectError:'.$e->getMessage());
  } return $pdo;
}

function loginCheck() {
  if(!isset($_SESSION["chk_ssid"]) || $_SESSION["chk_ssid"]!= session_id()) {
    header("Location: login_check.html");
  } else {
    session_regenerate_id(true);
    $_SESSION["chk_ssid"] = session_id();
  }
}



?>