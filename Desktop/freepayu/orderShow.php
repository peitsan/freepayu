<?php
/**
 * Created by PhpStorm.
 * User: yjry
 * Date: 2018/4/25
 * Time: 18:51
 */
include "connectSQL.php";
session_start();
$user=$_SESSION['user'];
$orderlist=array();
$goodlist=array();
$sql="select * from orders where UserName='$user'order by OrderTime desc";
$result=mysqli_query($coon,$sql);
while ($row = mysqli_fetch_assoc($result)){
    $data[]=$row;
}
for($i=0;$i<sizeof($data);$i++) {
//    echo $data[$i]['Goods'];
    $orderlist[$i]=explode("|",$data[$i]['Goods']);
//    var_dump(sizeof($orderlist[$i]));
//    var_dump($orderlist[$i]);
//    var_dump('<br>');
}
if($user!='') {
    $sql2 = "select * from usertext where UserName='$user'";
    $result2 = mysqli_query($coon, $sql2);
    $row2 = mysqli_fetch_assoc($result2);
}
//echo sizeof($orderlist);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="styles/index-style.css">
    <link rel="stylesheet" href="styles/allset.css">
    <link rel="stylesheet" href="styles/bootstrap.min.css">
    <link rel="shortcut icon" href="./img/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="styles/fontawesome-all.css">
    <script src="scripts/bootstrap.min.js"></script>
    <script src="scripts/jquery-3.3.1.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>订单|自在巴渝</title>
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
		<hr>
    <hr>
    <h3>我的订单</h3>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th style="width: 30%;">宝贝</th>
            <th style="width: 10%;">单价</th>
            <th style="width: 10%;">数量</th>
            <th style="width: 10%;">小计</th>
            <th style="width: 10%;">总价</th>
            <th style="width: 10%;">是否付款</th>
            <th style="width: 20%;">操作</th>
        </tr>
        </thead>
    </table>
    <?php
    for($i=0;$i<sizeof($orderlist);$i++){
    ?>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th colspan="7" style="background-color: #F1F1F1;">
                    <?php echo $data[$i]['OrderTime']?>&nbsp;&nbsp;
                    <span>订单号：&nbsp;&nbsp;</span>
                    <?php echo $data[$i]['OrderID']?>
                </th>
            </tr>
            </thead>
        <?php
    for($j=0;$j<sizeof($orderlist[$i]);$j++){
    $goodlist[$j]=explode(",",$orderlist[$i][$j]);
    //        var_dump($goodlist[$j]);
    //        var_dump('<br>');
    $str=$goodlist[$j][0];
    $sql1="select * from goods where GoodId='$str'";
    $result1=mysqli_query($coon,$sql1);
    $row1=mysqli_fetch_assoc($result1);
//    echo $row1['GoodName'];
//    var_dump('<br>');
    ?>
        <tr>
            <td style="width: 30%;"><?php $imagepath="images/goodImages/".$str;$href="goodDetail.php?id=".$row1['GoodId']; echo "<a href='$href'>
            <img class='img-circle' style='width: 50px;height: 50px;' src='$imagepath.png'></a>";
            echo "<a style='text-decoration: none;color: black;' href='$href'><span>".$row1['GoodName']."</span></a>";?></td>
            <td style="width: 10%;">
            <?php if($row2['IsVIP']=='0') $price=$row1['GoodPrice1'];else $price=$row1['GoodPrice2'];echo $price;?></td>
            <td style="width: 10%;"
            ><?php echo $goodlist[$j][1];?></td>
            
            <td style="width: 10%;"><?php echo $goodlist[$j][1]*$price;?></td>
            <?php
            if($j==0) {
                $str1=($data[$i]['IsPaid']=='0')?"否":"是";
                echo "<td style='width: 10%;' rowspan='0'>".$data[$i]['OrderPrice']."</td>";
                echo "<td style='width: 10%;' rowspan='0'>" . $str1 . "</td>";
                if($str1=='否') {
                    echo "<td style='width: 20%;' rowspan='0'>
                    <a class='btn btn-info' href='orderPay.php?orderID=". $data[$i]['OrderID'] . "'>支付</a>&nbsp;&nbsp;&nbsp;
                    <a class='btn btn-danger' href='orderDelHandle.php?orderID=". $data[$i]['OrderID'] . "'>取消订单</a>
                    </td>";
                }
                elseif ($str1=='是') {
                    echo "<td style='width: 20%;' rowspan='0'>
                    <a disabled='disabled' class='btn btn-info' href='orderPay.php?orderID=" . $data[$i]['OrderID'] . "'>支付</a>&nbsp;&nbsp;&nbsp;
                    <a disabled='disabled' class='btn btn-danger' href='orderDelHandle.php?orderID=" . $data[$i]['OrderID'] . "'>取消订单</a>
                    </td>";
                }
            }
            ?>
        </tr>
    <?php
    }
    ?>
    </table>
        <?php
    }
    ?>

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
