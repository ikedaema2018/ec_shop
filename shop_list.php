<?php
session_start();
include "funcs.php";
$pdo = nagiConnect();

$stmt = $pdo->prepare("SELECT * FROM shop_table");
$status = $stmt->execute();

$view = "";
if ($status = false) {
    $error = $stmt->errorinfo();
    exit("QueryError: " . $error[2]);
} else {
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $view .= '
    <div class=" col-sm-4">
      <div class="panel panel-default">
      <div class="panel-heading h-20">' . $result["title"] . '<a href="update_view.php?id=' . $result["id"] . '" class="glyphicon glyphicon-pencil pencil"></a><a href="delete.php?id=' . $result["id"] . '" class="glyphicon glyphicon-trash trash"></a></div>
      <div class="panel-body h-100">
        <img class="h250" src="' . $result["image"] . '" alt="">
        <p class="artist">¥' . $result["price"] . '</p>
        <a href="cart_insert.php?id=' . $result["id"] . '" class="btn btn-primary">カートに入れる</a>
        </div>
        </div>
      </div>
  ';
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/bootstrap-theme.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="./css/style.css">
  <title>SHOPリスト</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="shop_list.php">商品棚</a><a href="product_register.php" class="btn btn-info">新しい商品を追加する</a><a href="logout.php" class="logout">ログアウト</a>
        <a href="cart_view.php" class="btn btn-warning glyphicon glyphicon-shopping-cart">カートへ行く

        </a>
          </ul>
      </nav>
      <div class="cart-window">
        <div>カート内商品数
        <a class="glyphicon glyphicon-shopping-cart"><?=$_SESSION["count"]?></a>
</div>
<div>合計金額
       <a class="glyphicon glyphicon-copyright-mark" href="">
          <?php

$goukei = 0;
if (isset($_SESSION["item"])) {
    for ($i = 0; $_SESSION["count"] > $i; $i++) {
        $goukei += $_SESSION["amount"][$i];
    }

}
echo $goukei;
?>
</a>
</div>
      </div>



        <!-- <a class="navbar-brand" href="#">やなぎなぎCDラック</a><span class="glyphicon glyphicon-plus plus"></span> -->


    <div class="container">
      <div class="row">
      <?=$view?>
      </div>
    </div>
  </body>
</body>
</html>
<!-- $_SESSION["count"]=0;
$_SESSION["item"][$_SESSION["count"]]="PHP初球";
$_SESSION["amount"][$_SESSION["count"]]=1000;
for(){ -->

}
