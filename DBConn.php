<?php

function OpenDB()
{
    $host="localhost";
    $user="root";
    $pwd="root";
    $dbname="SecondHand";
    $link=mysqli_connect($host,$user,$pwd,$dbname);
   
    if(mysqli_connect_errno()==0)
    {
      
        mysqli_set_charset($link, "utf8");
        return($link);
    }
    else
    {
        echo "数据库连接失败！";
    }
}
