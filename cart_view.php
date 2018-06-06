<?php
session_start();
include("funcs.php");
loginCheck();
$view = "";
for($i = 0; $i<$_SESSION["count"]; $i++){
  $view .= 
  '<tr><td><img class="img-size" src="'.$_SESSION["image_url"][$i].'" alt="no image"></td><td>'.$_SESSION["item"][$i].'</td><td>'.$_SESSION["amount"][$i].'</td><td><a href="delete_cart.php?id='.$i.'" class="glyphicon glyphicon-remove"></a></td></tr>'
  ;
}
?>
<!DOCTYPE html>
<html lang="en">
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
  <title>カート一覧</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="shop_list.php">商品棚へ戻る</a> 
        <a style="color:white;">
          <?php
          $goukei = 0;
          if (isset($_SESSION["item"])) {
              for ($i = 0; $_SESSION["count"] > $i; $i++) {
                  $goukei += $_SESSION["amount"][$i];
              }
          
          }
          ?>
        </a> 
        <a href="logout.php" class="logout">ログアウト</a>
        
          </ul>
      </nav>
      <div class="container">
    <div class="panel panel-danger">
      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr><th>image</th><th>商品名</th><th>金額</th></tr>
          </thead>
            <tbody>
            <?php echo $view ?>
            <tr><td>商品合計金額：</td><td style="font-size: 16px;font-weight:bold;">¥<?=$goukei?></td><td><form action="kakutei_view.php"><input type="hidden" ><button type="submit" class="btn btn-primary">購入を確定する</button></form></td><td></td></tr>
            </tbody>
           
          </thead>
        </table>
      </div>
    </div>
  </div>

</body>
</html>

