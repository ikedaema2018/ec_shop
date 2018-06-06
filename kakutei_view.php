<?php
session_start();
$id = $_SESSION["id"];
include("funcs.php");
  loginCheck();
 
 //メール処理






// date()で日時を出力
$tttime = date("Y/m/d", strtotime("+2 day"));
  $pdo = nagiConnect();
  $stmt = $pdo->prepare("SELECT * FROM user_table WHERE id = :id");
  $stmt->bindValue(':id', $id, PDO::PARAM_INT);
  $status = $stmt->execute();
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  
  $goukei = 0;
  if (isset($_SESSION["item"])) {
      for ($i = 0; $_SESSION["count"] > $i; $i++) {
          $goukei += $_SESSION["amount"][$i];
      }
  
  }
  $to = $result["mail"];
$subject = "注文確定のお知らせ";
$message = "";
if (isset($_SESSION["item"])) {
  for ($i = 0; $_SESSION["count"] > $i; $i++) {
      $message .= $_SESSION["item"][$i];
  }

}
  $_SESSION = array();

session_regenerate_id(true);

$_SESSION["chk_ssid"]  = session_id();
  $_SESSION["id"] = $result["id"];
  $_SESSION["user_id"] = $result["user_id"];
  $_SESSION["kanri_flag"] = $result["kanri_flag"];
  $_SESSION["count"] = 0;
  $_SESSION["item"] = [];
  $_SESSION["amount"] = [];
  $_SESSION["shouhin_id"] = [];

//メール処理
$subject = "注文確定のお知らせ";
$headers = "From:maedakei0817@gmail.com";




//処理後、index.phpへリダイレクト
// header("Location: login.php");
mail($to, $subject, $message, $headers, '-f'.'.maedakei0817@gmail.com.');
echo $message
// echo $subject;
// echo $message;
// echo $add_header;

// function mailsender($to,$subject,$body,$fromname,$fromaddress){
//   //SMTP送信
//   $mail = new Qdmail();
//   $mail -> smtp(true);
//   $param = array(
//       'host'=>'（SMTPサーバー名）',
//       'port'=> 587 ,
//       'from'=>'（Return-Pathにはいるメールアドレス）',
//       'protocol'=>'SMTP_AUTH',
//       'user'=>'（SMTP認証ユーザー名）',
//       'pass' => '（SMTP認証パスワード）',
//   );
//   $mail ->smtpServer($param);
//   $mail ->to($to);
//   $mail ->subject($subject);
//   $mail ->from($fromaddress,$fromname);
//   $mail ->text($body);
//   $return_flag = $mail ->send();
//   return $return_flag
// }

  ?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="./css/style.css?3">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="./css/bootstrap-theme.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
  <title>確定ページ</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="shop_list.php">商品棚</a> 
          </ul>
      </nav>
  <p><?=$result["user_id"]?>さんの注文を受け付けました</p>
  <p>ご注文の品物は<?=$tttime?>までに<?=$result["address"]?>にお届けいたします。</p>
  <p>代引きにて<?=$goukei?>円をお支払いただきますようお願い申し上げます。</p>
</body>
</html>


