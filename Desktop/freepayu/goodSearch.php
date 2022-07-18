<?php
include "connectSQL.php";
session_start();
$order=$_GET['order'];
$goodsearch=$_POST['goodsearch'];
if($goodsearch=='')
    $goodsearch=$_GET['goodsearch'];
switch ($order){
    case '':
    case 'default':
        $sql="select * from goods where GoodName like '%$goodsearch%'";
        break;
    case 'timefromnew':
        $sql="select * from goods where GoodName like '%$goodsearch%' order by UpdateTime desc ";
        break;
    case 'timefromold':
        $sql="select * from goods where GoodName like '%$goodsearch%' order by UpdateTime";
        break;
    case 'pricefromhigh':
        $sql="select * from goods where GoodName like '%$goodsearch%' order by GoodPrice1 desc";
        break;
    case 'pricefromlow':
        $sql="select * from goods where GoodName like '%$goodsearch%' order by GoodPrice1";
        break;
    case 'soldfromhigh':
        $sql="select * from goods where GoodName like '%$goodsearch%' order by SoldNumber desc";
        break;
    case 'soldfromlow':
        $sql="select * from goods where GoodName like '%$goodsearch%' order by SoldNumber";
        break;
}
if($result=mysqli_query($coon,$sql)){
    while ($row = mysqli_fetch_assoc($result)){
        $data[]=$row;
    }
}
else
    $data=array();
$num=mysqli_num_rows($result);
$user=$_SESSION['user'];
if($user!='') {
    $sql1 = "select * from usertext where UserName='$user'";
    $result1 = mysqli_query($coon, $sql1);
    $row1 = mysqli_fetch_assoc($result1);

}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="styles/index-style.css">
    <link rel="stylesheet" href="styles/allset.css">
    <link rel="stylesheet" href="styles/bootstrap.min.css">
    <link rel="stylesheet" href="styles/fontawesome-all.css">
    <script src="scripts/bootstrap.min.js"></script>
    <script src="scripts/jquery-3.3.1.min.js"></script>
    <script src="scripts/cartHandle.js"></script>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>搜索|自在巴渝</title>
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
    <div class="panel panel-default">
        <div class="panel-body search-firstline">
            <span style="float: left;line-height: 20px;margin-left: 30px;margin-right: 20px;">排序</span>
            <ul>
          <li style="margin-right: 40px;<?php echo ($order=='default'||$order=='')?"font-weight:bolder":"";?>"><a href="lastGoods.php?order=default">默认排序</a></li>
                <li style="margin-right: 40px;<?php echo ($order=='timefromnew')?"font-weight:bolder":"";?>"><a href="lastGoods.php?order=timefromnew">按时间降序</a></li>
                <li style="margin-right: 40px;<?php echo ($order=='timefromold')?"font-weight:bolder":"";?>"><a href="lastGoods.php?order=timefromold">按时间升序</a></li>
                <li style="margin-right: 40px;<?php echo ($order=='pricefromhigh')?"font-weight:bolder":"";?>"><a href="lastGoods.php?order=pricefromhigh">价格高->低</a></li>
                <li style="margin-right: 40px;<?php echo ($order=='pricefromlow')?"font-weight:bolder":"";?>"><a href="lastGoods.php?order=pricefromlow">价格低->高</a></li>
                <li style="margin-right: 40px;<?php echo ($order=='soldfromhigh')?"font-weight:bolder":"";?>"><a href="lastGoods.php?order=soldfromhigh">销量高->低</a></li>
                <li style="margin-right: 40px;<?php echo ($order=='soldfromlow')?"font-weight:bolder":"";?>"><a href="lastGoods.php?order=soldfromlow">销量低->高</a></li>
</ul>
        </div>
    </div>
    <div class="row">
        <?php
        if(!empty($data)) {
            foreach ($data as $value) {
                ?>
                <div class="col-md-4">
                    <div><?php $imagepath="images/goodImages/".$value['GoodId'];$href="goodDetail.php?id=".$value['GoodId']; 
                    echo "<a href='$href'><img class='img-rounded' style='width: 100%;height: 400px;'' src='$imagepath.png'></a>"; ?></div>
                    <h5>
                        <span>FREEPAYU</span><br>
                        <span style="font-size: 18px;font-family: Arial;">￥<?php echo $value['GoodPrice1']; ?></span><br>
                        <span style="color: #ff4400;font-size: 18px;">VIP：<strong>￥<?php echo $value['GoodPrice2']; ?></strong></span>
                        <span style="float: right;color: #828282;">已有<?php echo $value['SoldNumber']; ?>人购买</span><br>
                        <span><?php echo $value['GoodName']; ?></span><br>
                        <span style="color: #828282;"><?php echo $value['GoodSummary']; ?></span><br>
                        <span>
                                <a class="btn btn-info btn-xs" href="goodDetail.php?id=<?php echo $value['GoodId'] ?>">查看详情</a>
                                <a class="btn btn-danger btn-xs" style="color: #F22D00;" href="cartAddHandle.php?id=<?php echo $value['GoodId'] ?>"><span style="color: white;">加入购物车</span></a>
                            </span>
                    </h5>
                </div>
                <?php
            }
        }
        else
            echo "<h3>&nbsp;&nbsp;&nbsp;没有查询到相关商品信息！</h3>";
        ?>
    </div>
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