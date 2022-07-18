<?php
/**
 * Created by PhpStorm.
 * User: yjry
 * Date: 2018/4/25
 * Time: 18:51
 */
include "connectSQL.php";
session_start();
$arr=array();
$arr=$_POST['select'];
$arr1=$_POST['num'];
$address=$_POST['address'];
$sumprice=$_POST['sumprice'];
$name=$_POST['name'];
$phone=$_POST['phone'];
$words=$_POST['words'];
$user=$_SESSION['user'];
$goods="";
$orderID = date("Ymd").substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8); 
$ordertime=date("Y-m-d H:i:s");
$sql="select * from usertext where UserName='$user'";
$result=mysqli_query($coon,$sql);
$row=mysqli_fetch_assoc($result);
//echo $address;
//if(empty($sumprice))
//    echo "总价为空.";
//else
//    echo $sumprice;
//if(empty($arr)||empty($arr1))
//    echo "为空？？？";
//else{
//    for($i=0;$i<sizeof($arr);$i++){
//        echo $arr[$i].",".$arr1[$i];
//    }
//}
//将商品ID和商品数量合并到一起，存放到新数组中
function composeGoods($str1,$str2){
    $goods=array();
    $lastgoods="";
    for($i=0;$i<sizeof($str1);$i++){
        $goods[$i]=$str1[$i].",".$str2[$i];
    }
    for($i=0;$i<sizeof($str1);$i++){
        if($i==sizeof($str1)-1)
            $lastgoods.=$goods[$i];
        else
            $lastgoods.=($goods[$i]."|");
    }
    return $lastgoods;
}
$goods=composeGoods($arr,$arr1);
//echo $goods;
//for($i=0;$i<sizeof($goods);$i++){
//    echo $goods[$i];
//}
if($address==''||$name==''||$phone=='')
    echo "<script>alert('您的信息填写不完整，请重新核实！');window.location.href='shoppingCart.php';</script>";
else {
    if(mb_strlen($words)>=255){
        echo "<script>alert('你的留言超出了最大限制长度（255）！请重新输入。');window.location.href='shoppingCart.php';</script>";
    }
    else {
        $sql = "insert into orders(OrderID,OrderTime, Goods, UserName, ReceiveName, Phone, Address, Words, OrderPrice, IsPaid) 
values ('$orderID','$ordertime','$goods','$user','$name','$phone','$address','$words','$sumprice','0')";
        $result1 = mysqli_query($coon, $sql);
        if ($result1 != false) {
            unset($_SESSION['cartlist']);
            echo "<script>alert('提交订单成功！');</script>";
        } else
            echo "<script>alert('订单提交失败！');history.back();</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="styles/index-style.css">
    <link rel="stylesheet" href="styles/allset.css">
    <link rel="stylesheet" href="styles/bootstrap.min.css">
    <link rel="stylesheet" href="styles/fontawesome-all.css">
    <script src="scripts/bootstrap.min.js"></script>
    <script src="scripts/jquery-3.3.1.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>订单管理|自在巴渝</title>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
</head>
<body>
<div class="content">
    <div class="row" style="margin-top: 20px;">
        <div class="navbar navbar-inverse navbar-fixed-top">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>                        
                        </button>
                        <a class="navbar-brand" href="index.php">自在巴渝</a>
                    </div>
                           <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href = "shoppingCart.php"><span class = "glyphicon glyphicon-shopping-cart"></span> 购物车 </a></li>
                        <li><a href = "userInfo.php"><span class = "glyphicon glyphicon-user"></span> 个人 </a></li>
                        <li><a href = "userInfoChange.php"><span class = "glyphicon glyphicon-user"></span> 设置</a></li>
                       <li><a href = "loginOut.php"><span class = "glyphicon glyphicon-log-in"></span> 登出</a></li>
                    </ul>
                        </div>
            </div>
        </div>
    
    </div>
    <hr style="height: 2px;background-color: black;border: 1px solid black;">
    <hr>
    <h1>提交订单成功！</h1><a href="orderShow.php">查看订单</a>
</div>


<!--Footer-->
<footer>
            <div class="container">
                <center>
                    <p>Copyright &copy;自在巴渝. All Rights Reserved 2022-2025 |  商业合作: +86 13364063027</p>	
                </center>
            </div>
        </footer>
        <!--Footer end-->
        </body>
</html>


