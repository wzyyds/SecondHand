<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<title>新用户注册页面</title>
<style type="text/css">

#registar{
background:url(wenhua.jpeg);
   background-size:100%;
   text-align:center;width:300px;height:250px;
margin-left:auto;margin-right:auto;margin-top:100px;
padding:20px;border:solid 2px rgb(0,0,0);
}

input.button{font-size:16px;width:70px;height:30px;margin-top:5px;margin-bottom:5px;}

</style>
</head>
<body>
<?php 
include_once "DBConn.php";
$registar_msg=null;
if(isset($_POST['registar'])){
    if($_POST['npwd']==$_POST['npwd1'])
    {
    $usname=trim($_POST['nname']);
    $pwd=trim($_POST['npwd']);
    $link=OpenDB();
    if($link)
    {
        $sql="SELECT * FROM user WHERE usname='".$usname."' ";
        $result=mysqli_query($link, $sql);
        $num = mysqli_num_rows($result);
        if(!$num)
        {
        $sql1 = "insert into user values('$usname','$pwd')";
        $result1=mysqli_query($link, $sql1);
        if($result1){
            $registar_msg="注册成功！请重新登录";
            
        }
        mysqli_close($link);  
}
else{
     $registar_msg="用户已经存在，请重新输入！";
}
    }   
}
else{
     $registar_msg="两次密码输入不一致，请重新输入！";
}
}
if(isset($_POST['back']))
{
    header("location:login.php");
}
?>

<form name="form2" action="" method="POST">
<div id="registar">
<span>请输入您的新用户名和新密码</span><br /><br/>
<span>&nbsp;&nbsp;用户名：</span><input type="text" name="nname" /><br /><br />
<span>&nbsp;&nbsp;密&nbsp;&nbsp;&nbsp;码：</span><input type="password" name="npwd" /><br /><br />
<span>确认密码：</span><input type="password" name="npwd1" /><br /><br />
&nbsp;&nbsp;&nbsp;<input type="submit" name="registar" value="注册"/>&nbsp;&nbsp;
<input type="submit" name="back" value="重新登录"/>
<h4 style="color:black"><?php if($registar_msg) echo $registar_msg;?></h4>


</div> 
</form>
</body>
</html>
