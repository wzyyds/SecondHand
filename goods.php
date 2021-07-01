<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<title>商品页面</title>
<style type="text/css">
 body{background:url(xzshz.jpg);
      background-size:100%;
      background-attachment:fixed;
      background-repeat: no-repeat; }
#biankuang{
background-color=rgb(188,188,188);
text-align:center;width:400px;height:30px;
margin-left:auto;margin-right:auto;margin-top:0px;
padding:20px;
}
span{text-align:center;font-size:30px;color:rgb(600,600,600)}

.tbl_goods{
color:yellow;
font-size:28px;
margin:auto;
width:600px;
border-collapse:collapse;
border:solid 1px rgb(0,0,0);

}
#tbl_goods td{

border:solid 1px rgb(0,0,0);
}

#goods{
text-align:center;width:500px;height:400px;
margin-left:auto;margin-right:auto;margin-top:50px;
padding:20px;
}
input.button{font-size:16px;width:70px;height:30px;margin-top:5px;margin-bottom:5px;}


</style>
</head>
<body >
<?php

include_once 'DBConn.php';
$link=OpenDB();
$result=false;

$search_msg=null;
if($link && isset($_GET['ok2']))
{
    $info=trim($_GET['info']);
    
    
    if(strlen($info)>0)
    {
        
        $sql1="SELECT * FROM goods WHERE gname='$info'" ;
        $result1=mysqli_query($link, $sql1);
        $num1 = mysqli_num_rows($result1);
        $sql2="SELECT * FROM goods WHERE gmodel='$info'";
        $result2=mysqli_query($link, $sql2);
        $num2 = mysqli_num_rows($result2);
        if($num1){
            $sql="SELECT * FROM goods WHERE gname='$info'" ;
        }else if($num2){
            $sql="SELECT * FROM goods WHERE gmodel='$info'";
        }else{
            $sql="SELECT * FROM goods WHERE gname='$info'" ;
        }
        $search_result=mysqli_query($link, $sql);
        if(mysqli_errno($link)==0)
        {
            if(mysqli_num_rows($search_result)==0){
                $search_msg="对不起，没有找到你想要的商品";
            }else
                $search_msg="搜索到 ".mysqli_num_rows($search_result)." 件商品。";
        }
        else
            $search_msg="查询错误：".mysqli_error_list($link);
    }
    else{
        $search_result=null;
        echo "请输入关键字！";
    }
} 
if($link)
{
    $sql="SELECT * FROM goods";
   
    $result=mysqli_query($link,$sql);
   
    if(mysqli_errno($link)==0)
    {
       
    }
    else 
    {
        $result=false;
    }
}
if(isset($_GET['gwc'])){
    header("location:cart.php");
}
?>
<form name="form1" action="" method="GET">
<div >
<span style=" text-align:center;color:white">欢迎进入文华二手交易市场！</span><br /><br/>
</div>
<div>
<a href="login.php" style="font-size:20px; float:right;color:black">退出登录</a><br /><br />
<a href="lianxi.php" style="font-size:20px; float:right;color:black">联系我们</a><br /><br />
</div>
<div >
<input type="text" name="info" style="font-size:25px" placeholder="请输入商品名或品牌"/>&nbsp;&nbsp;
<br />
<input type="submit" name="ok2" value="搜索" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type='submit' name='gwc' value='购物车' />&nbsp;&nbsp;
<h4 style="color:white"><?php if($search_msg) echo $search_msg;?></h4>
<br />

<?php
if(isset($_GET['ok2']) && is_object($search_result))
{

    while ($row=mysqli_fetch_array($search_result)) {
        ?>
    
   <table class="tbl_goods"   border="1" style="float:left" >
   
   <tr><td >商品名：<?php echo $row["gname"]?></td></tr>
   <tr><td >品牌：<?php echo $row["gmodel"]?></td></tr>
  
   <tr><td >价格：<?php echo $row["gprice"]?></td></tr>
   <tr><td align="center"><a href="bought.php?id=<?php echo $row["gid"]?>&name=<?php echo $row["gname"]?>&model=<?php echo $row["gmodel"]?>&price=<?php echo $row["gprice"]?>">购买</a></td>
 </tr>
</table>
<?php 
    }
    mysqli_free_result($search_result);
}
?>
</div>

<div>

<?php
if(!isset($_GET['ok2'])&&$result)
{   
     while ($row=mysqli_fetch_array($result)) 
     {
         ?>
   <table class="tbl_goods"   border="1" style="float:left">
   
   <tr><td >商品名：<?php echo $row["gname"]?></td></tr>
   <tr><td >品牌：<?php echo $row["gmodel"]?></td></tr>  
   <tr><td >价格：<?php echo $row["gprice"]?></td></tr>
   <tr><td align="center"><a href="bought.php?id=<?php echo $row["gid"]?>&name=<?php echo $row["gname"]?>&model=<?php echo $row["gmodel"]?>&price=<?php echo $row["gprice"]?>">购买</a></td>
 </tr>
</table>
<?php
}
?>
   
<?php  
    mysqli_close($link);
}
?>
</div>
</form>
</body>
</html>

