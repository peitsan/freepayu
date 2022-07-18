<?php
/**
 * Created by PhpStorm.
 * User: yjry
 * Date: 2018/4/28
 * Time: 18:44
 */
include "connectSQL.php";
session_start();
$user=$_SESSION['user'];
if($user!='') {
    $sql1 = "select * from users where UserName='$user'";
    $result1 = mysqli_query($coon, $sql1);
    $row1 = mysqli_fetch_assoc($result1);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
    <link rel="stylesheet" href="styles/index-style.css">
    <link rel="stylesheet" href="styles/allset.css">
    <link rel="shortcut icon" href="./img/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="styles/bootstrap.min.css">
    <link rel="stylesheet" href="styles/fontawesome-all.css">
    <script src="scripts/bootstrap.min.js"></script>
    <script src="scripts/jquery-3.3.1.min.js"></script>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>会员|自在巴渝</title>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
</head>
<body style="margin: 0 auto;">

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
                        <a class="navbar-brand" href="index.html">自在巴渝</a>
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



      <div class="navbar navbar-inverse">
        <ul class="nav nav-pills navbar-nav">
            <li><a href="lastGoods.php">新品上市</a></li>
            <li><a href="hotGoods.php">最热爆款</a></li>
        </ul>
                <form class="navbar-form navbar-right" method="post" action="goodSearch.php?order=<?php echo $order;?>">
                <p style="display: inline;color: white;">当前共有<?php echo mysqli_num_rows($result); ?>条商品信息&nbsp;&nbsp;&nbsp;</p>
                <div class="form-group">
                    <input type="text" class="form-control" name="goodsearch" placeholder="请输入商品名检索信息" />
                </div>
                <button type="submit" class="btn btn-default">搜索</button>
            </form>
    </div>
    <hr>
    <h3>什么是VIP？</h3>
    <p>VIP是指注册在本网站的尊贵会员，在购物时享有商品的折扣价格优惠。</p>
    <h3>如何成为VIP？</h3>
    <p>只要在本网站注册并且消费金额达到10000万及以上，用户自动升级为VIP，享有独有优惠价格。</p>
</div>
<script type="text/javascript">
    $(function(){
        $("li").click(function(){
            $(this).addClass("active").siblings().removeClass("active");
        })
    })
</script>

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