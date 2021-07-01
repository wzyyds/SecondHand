<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<title>商品页面</title>
<style type="text/css">
 body{background:url(xzshz.jpg);
      background-size:100%;
      background-attachment:fixed;
      background-repeat: no-repeat; 
      }
div{
            text-align: center;
        }

.tbl_cart{

color:yellow;
font-size:28px;
margin-top:100px;
margin-left:300px;
width:600px;
border-collapse:collapse;
border:solid 1px rgb(0,0,0);

}
#tbl_cart td{
border:solid 1px rgb(0,0,0);
}


</style>
</head>
<body>
<?php
session_start();
$arr=$_SESSION["cart"];
$pay_msg=null;
?>

<table class="tbl_cart">
  <tr>
   <td>编号</td>
   <td>商品名</td>
  <td>品牌</td>
  <td>单价</td>
   <td>数量</td>
   <td></td>
   
  </tr>
<?php
$amount=0;
foreach($arr as $a)
{
    $amount+=($a["num"]*$a["price"]);
?>
     <tr>
   <td ><?php echo $a["pid"]?></td>
   <td ><?php echo $a["name"]?></td>
   <td ><?php echo $a["model"]?></td>
   <td ><?php echo $a["price"]?></td>
   <td><?php echo $a["num"]?></td>  
   <td ><a href="delete.php?id=<?php echo $a['pid']?>">删除</a></td>
</tr>
<?php
}
if(isset($_GET['back'])){
    header("location:goods.php");
}
if(isset($_GET['pay'])){
    $pay_msg="结算成功！";
}

?>
<tr><td >总金额</td>
<td  align="center" colspan="5"><?php echo $amount;?></td></tr>
</table>
<form name="form1" action="" method="GET">
<br /><br/>
<div>
<input type="submit" name="back" value="返回继续购物" />&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" name="pay" value="结算"  />
<input type="submit" name="empty" value="清空"  />
<h4 style="color:white"><?php if($pay_msg) echo $pay_msg;?></h4>
</div>
</form>
</body>
 </html>