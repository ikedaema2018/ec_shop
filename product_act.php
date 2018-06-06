<?php
$url = $_POST["url"];

require_once __DIR__ . '/vendor/autoload.php';

$cli = new Goutte\Client();
$crawler = $cli->request('GET',$url);

$title = $crawler->filter('#landingImage')->extract('alt');
$img = $crawler->filter('#landingImage')->extract('data-old-hires');
// $img = $crawler->filter('#landingImage')->attr('src');
// var_dump($img);
// $crawler->filter('img')->each(function ($node) {
//   echo $node->attr('src')."\n";
// });
// $price = $crawler->filter('#priceblock_ourprice');
// echo var_dump($aiu);
$mana_title = $title[0];
$mana_img = $img[0];
// var_dump($price);

// $aiu = $crawler->filter('title');
// echo $aiu->text();

$price = $crawler->filter('#priceblock_ourprice')->text();
$price2 = str_replace('￥','',$price);
$price3 = str_replace(',','',$price2);
$mana_price = intval($price3);

include("funcs.php");
$pdo = nagiConnect();

$sql = "INSERT INTO shop_table(id, title, price, image)VALUES(NULL, :title, :price, :image)";
$stmt = $pdo->prepare($sql);

$stmt->bindValue(':title', $mana_title, PDO::PARAM_STR);
$stmt->bindValue(':price', $mana_price, PDO::PARAM_INT);
$stmt->bindValue(':image', $mana_img, PDO::PARAM_STR);


$status = $stmt->execute();

if($status==false){
  $error = $stmt->errorinfo();
  exit("QueryError: ".$error[2]);
}else{
  header("Location: shop_list.php");
}
?>

