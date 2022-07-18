<?php
/**
 * Created by PhpStorm.
 * User: yjry
 * Date: 2018/4/26
 * Time: 22:06
 */
include "connectSQL.php";
//$sql="select * from goods";
session_start();
$user=$_SESSION['user'];
$sql="select * from orders where UserName='$user'";
if($result=mysqli_query($coon,$sql)){
    while ($row = mysqli_fetch_assoc($result)){
        $data[]=$row;
    }
}
else
    $data=array();
if($user!='') {
    $sql1 = "select * from usertext where email='$user'";
    $result1 = mysqli_query($coon, $sql1);
    $row1 = mysqli_fetch_assoc($result1);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>个人中心</title>
    <link rel="stylesheet" href="styles/index-style.css">
    <link rel="shortcut icon" href="./img/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="styles/allset.css">
    <link rel="stylesheet" href="styles/bootstrap.min.css">
    <link rel="stylesheet" href="styles/fontawesome-all.css">
    <script src="scripts/bootstrap.min.js"></script>
    <script src="scripts/jquery-3.3.1.min.js"></script>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>个人|自在巴渝</title>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
</head>
<body style="margin: 0 auto;"><div class="content">
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
    </div>
    <hr>
    <table class="table table-bordered">
        <thead><p style="font-size: 24px;font-weight: bold;">个人资料</p></thead>
        <tr style="font-size: 16px;">
            <td>
                <span>当前头像：</span><img style="width: 60px;height: 60px;" src="<?php echo $row1['Image']; ?>" alt="">
                <p>用户名：&nbsp;&nbsp;<?php echo $row1['username'];?></p>
                <p>真实姓名：&nbsp;&nbsp;<?php echo $row1['TrueName'];?></p>
                <p>性别：&nbsp;&nbsp;<?php echo $row1['Sex'];?></p>
                <p>年龄：&nbsp;&nbsp;<?php echo $row1['userage'];?></p>
                <p>邮箱：&nbsp;&nbsp;<?php echo $row1['email'];?></p>
                <p>联系电话：&nbsp;&nbsp;<?php echo $row1['phone'];?></p>
                <p>所在城市：&nbsp;&nbsp;<?php echo $row1['city'];?></p>
                <p>常用地址：&nbsp;&nbsp;<?php echo $row1['address'];?></p>
                <p>注册时间：&nbsp;&nbsp;<?php echo $row1['RegisterTime'];?></p>
                <p>已消费金额：&nbsp;&nbsp;<?php echo $row1['ConsumeNum'];?></p>
                <p>是否为VIP：&nbsp;&nbsp;<?php if($row1['IsVIP']=='0') echo "否";else echo "是";?><a style="text-decoration: none;" href="VIPExplain.php">&nbsp;&nbsp;什么是VIP？</a></p>
                <a class="btn btn-info" type="button" href="userInfoChange.php?userid=<?php echo $row1['UserId']?>">修改个人信息</a>
            </td>
        </tr>
    </table>
    <table class="table table-bordered">
        <thead><p style="font-size: 24px;font-weight: bold;">订单记录</p></thead>
        <tr style="font-size: 16px;">
            <td>
                <a style="text-decoration: none;" href="orderShow.php">查看我的订单</a>
            </td>
        </tr>
    </table>
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