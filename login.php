<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<title>登录页面</title>
<style type="text/css">
#login{
background:url(wenhua.jpeg);
   background-size:100%;
text-align:center;width:300px;height:250px;
margin-left:auto;margin-right:auto;margin-top:100px;
padding:20px;border:solid 2px rgb(0,0,0);
}

input.button{font-size:16px;width:70px;height:30px;margin-top:5px;margin-bottom:5px;}

</style>
</head>
<body >
<?php 
include_once "DBConn.php";
$login_msg=null;
if (isset($_POST["login"])){
    $usname=trim($_POST["name"]);
    $pwd=trim($_POST["pwd"]);
    $link=OpenDB();
    if($link)
    {
        $sql="SELECT * FROM user WHERE usname='".$usname."' and pwd='".$pwd."'";        
        $result=mysqli_query($link, $sql);
        if($result && is_object($result) && $row=mysqli_fetch_array($result))
        {          
            $_SESSION["us"]=$row["usname"];                     
           header("location:goods.php");
        }
        else
        {
            $login_msg="账号或密码错误，请重新登录！";
        }
        mysqli_close($link);
    }
}
if (isset($_POST["registar"])){
    header("location:registar.php");
}
?>
<form name="form1" action="" method="POST">
<div id="login">
<br /><br/>
<span>欢迎进入文华二手交易市场！请登录</span><br /><br/>
<span>用户名：</span><input type="text" name="name" /><br /><br />
<span>密&nbsp;&nbsp;&nbsp;码：</span><input type="password" name="pwd" /><br /><br />
&nbsp;&nbsp;&nbsp;
<input type="submit" name="login" value="登录"/>&nbsp;&nbsp;
<input type="submit" name="registar" value="注册"/>
<?php if($login_msg) echo "<script>alert('$login_msg')</script>";?>

</div> 
</form>
</body>
</html>
