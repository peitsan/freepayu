<!DOCTYPE html>
<html>
<head>
<title>登录成功</title>
<meta name="content-type"; charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>登录成功！|自在巴渝</title>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link rel="shortcut icon" href="./img/icon.png" type="image/x-icon">
        <link href="css/style.css" rel="stylesheet">
        <script src="js/jquery.js"></script>
        
        <script src="js/bootstrap.min.js"></script>
</head>
<body>

<div style="height:100%;">
    <div class="row" style="margin-top: 5%;margin-bottom: 15%;padding-left:10%;padding-top: 200px;padding-bottom: 200px;">
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


<div class="content">
<?php
// $Id:$ //开启session
session_start(); //声明变量
$username = isset($_SESSION['3ixcshz29i222']) ? $_SESSION['3ixcshz29i222'] : ""; //判断session是否为空
if (!empty($username)) { ?>
<h1>登录成功！</h1> 欢迎您！
<?php
    echo $username; ?>
<br/> <a href="index.php">退出</a> //跳转至主网页
<?php
} else { //未登录，无权访问
     ?>
 <h1>你无权访问！！！</h1>
 <?php
echo "<script> alert('sucess');parent.location.href='/user/index'; </script>";
?>
<?php
} ?> </div>
</div>
</body>

<!--footer-->
<footer>
            <div class="container">
                <center>
   					  <p> Copyright &copy;自在巴渝. All Rights Reserved 2022-2025 |  商业合作: +86 13364063027 </p>
                </center>
            </div>
        </footer>

</html>
