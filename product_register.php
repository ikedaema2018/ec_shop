<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="./css/jquery-2.1.3.min.js">
  <link rel="stylesheet" href="./js/bootstrap.js">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/bootstrap-theme.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <title>商品登録ページ</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="shop_list.php">商品棚へ戻る</a>
    
          <ul class="navbar-nav mr-auto">
            <!-- <li class="nav-item">
              <a class="nav-link" href="itiran.php">スレッド一覧</a>
            </li>
             -->
    
          </ul>
      </nav>

<div class="container jumbotron  top-30r">
  <h1 class="display-5 border-bottom bottom-30">商品登録ページ</h1>
  <form method="post" action="product_act.php">
    <div class="form-group">
      <label>amazonURLを入力してください</label>
      <input type="text" class="form-control" placeholder="amazon_url" name="url">
    </div>
    
    <button type="submit" class="btn btn-default">送信</button>
  </form>
</div>
  
</body>
</html>