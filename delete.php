<?php
session_start();
ob_start();
$pid=$_GET["id"];
$arr=$_SESSION["cart"];
foreach($arr as$key=>$proId)
{
    if($key==$pid)
    {
        unset($arr[$key]);
    }
}
$_SESSION["cart"]=$arr;
ob_clean();
header("location:cart.php");
?>

 