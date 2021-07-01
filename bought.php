<?php
include_once 'DBConn.php';
session_start();
ob_start();
$pid=$_GET["id"];
$name=$_GET["name"];
$model=$_GET["model"];
$price=$_GET["price"];
$arr=$_SESSION["cart"];

if(is_array($arr))
{      
    if(array_key_exists($pid,$arr))
    {       
        $uu=$arr[$pid];     
        $uu["num"]+=1;  
        $arr[$pid]=$uu; 
    }
    else
    {          
        $arr[$pid]=array("pid"=>$pid,"name"=>$name,"model"=>$model,"price"=>$price,"num"=>1);
    }
}
else
{    
    $arr[$pid]=array("pid"=>$pid,"name"=>$name,"model"=>$model,"price"=>$price,"num"=>1);
    
}

$_SESSION["cart"]=$arr;
ob_clean();
header("location:cart.php");
?>