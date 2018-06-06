<?php
session_start();
$_SESSION["count"] +=1 ;
$_SESSION["amount"][$_SESSION["count"]] = "aiueo";
echo $_SESSION["amount"][$_SESSION["count"]];
echo $_SESSION["amount"][5];
echo $_SESSION["count"];
?>