<?php
/**
 * Created by PhpStorm.
 * User: yjry
 * Date: 2018/4/10
 * Time: 14:10
 */
session_start();
include "connectSQL.php";
$id=$_GET['id'];
$sql="select * from goods where GoodId='$id'";
if($result=mysqli_query($coon,$sql)){
   $row = mysqli_fetch_assoc($result);
   $data[]=$row;
}
else
    $data=array();
//$num=mysqli_num_rows($result);
$sql1="select * from globaldescription";
if($result1=mysqli_query($coon,$sql1)){
    $row1=mysqli_fetch_assoc($result1);
    $data1[]=$row1;
}
$user=$_SESSION['user'];
if($user!='') {
    $sql1 = "select * from users where UserName='$user'";
    $result1 = mysqli_query($coon, $sql1);
    $row1 = mysqli_fetch_assoc($result1);
}
$sql3="select * from comments where GoodId='$id'";
if($result3=mysqli_query($coon,$sql3)){
    while($row3=mysqli_fetch_assoc($result3))
        $data3[]=$row3;
}
else
    $data3=array();
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
        <title>商品详情|自在巴渝</title>
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
                        <li><a href = "settings.php"><span class = "glyphicon glyphicon-user"></span> 设置</a></li>
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
            <form class="navbar-form navbar-right" action="goodSearch.php">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="请输入关键词" />
                </div>
                <button type="submit" class="btn btn-default">搜索</button>
            </form>
        </div>
		<hr>
        <div class="row">
            <?php
            if(!empty($data)) {
                foreach ($data as $value) {
                    ?>
                    <div class="col-md-8">
                        <div><?php $imagepath="images/goodImages/".$value['GoodId'];
                         echo "<a href='#'><img class='img-rounded' style='width: 50%;height: 50%;margin-left: 180px;' src='$imagepath.png'></a>"; ?></div><br><br>
                        <div><?php $imagepath="./images/goodImages/".$value['GoodName']."-2.jpg"; echo "<a href='#'><img class='img-rounded' style='width: 50%;height: 50%;margin-left: 180px;' src='$imagepath.png'></a>"; ?></div><br><br>
                        <h3>商品评论</h3><br>
                        <?php
                        if(!empty($data3)){
                            foreach ($data3 as $value3){
                                ?>
                                <table class="table">
                                    <tr>
                                        <td style="font-weight: bold;" colspan="2"><span><?php echo $value3['Time'];?></span></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 70px;font-weight: bold;"><span><?php echo $value3['UserName'];?></span></td>
                                        <td><span><?php echo $value3['Content'];?></span></td>
                                    </tr>
                                </table>
                                <br>
                                <?php
                            }
                        }
                        else
                            ?>
                            <span>该商品评论为空</span><br><br>
                        <?php
                        ?>
                        <form action="commentAddHandle.php" method="post">
                            <h4>写下你的评论</h4>
                            <textarea style="resize: none;" name="comment" cols="90" rows="6" placeholder="在这里写下你的评论。。。"></textarea>
                            <input type="hidden" name="goodid" value="<?php echo $id;?>">
                            <input class="btn btn-info" type="submit" value="提交评论">
                        </form>
                    </div>
                    <div class="col-md-4">
                        <span style="font-size: 25px;font-weight: bold;line-height: 35px;font-style: italic;font-family: Georgia, serif;">FREEPAYU</span><br><br>
                        <span><?php echo $value['GoodName']; ?></span><br>
                        <span style="color: #828282;"><?php echo $value['GoodSummary']; ?></span><br>
                        <span>普通会员价格：￥<?php echo $value['GoodPrice1']; ?></span><br>
                        <span style="color: red;">超级会员价格：<strong>￥<?php echo $value['GoodPrice2']; ?></strong></span><br>
                        <a class="btn btn-danger" style="color: #F22D00;width: 100%;" href="cartAddHandle.php?id=<?php echo $value['GoodId'] ?>"><span style="color: white;">加入购物车</span></a><br><br>
                        <div style="color: #828282;">
                            <h3 style="font-size: 15px;font-weight: lighter;font-family: Times, serif, simhei;border-bottom: 1px solid black;">规格参数<br><span>composition</span></h3>
                            <span>
                                <?php
                                $size=$value['GoodSize'];
                                $sqlsize="select * from goodsizes where SizeId='$size'";
                                $result=mysqli_query($coon,$sqlsize);
                                $row=mysqli_fetch_assoc($result);
                                if($row['红玫瑰']!=0){
                                    echo $row['红玫瑰']."朵红玫瑰";
                                }
                                if($row['满天星']!=0){
                                    echo $row['满天星']."朵满天星";
                                }
                                if($row['百合']!=0){
                                    echo $row['百合']."朵百合";
                                }
                                if($row['紫玫瑰']!=0){
                                    echo $row['紫玫瑰']."朵紫玫瑰";
                                }
                                if($row['蓝玫瑰']!=0){
                                    echo $row['蓝玫瑰']."朵蓝玫瑰";
                                }
                                if($row['郁金香']!=0){
                                    echo $row['郁金香']."朵郁金香";
                                }
                                if($row['白玫瑰']!=0){
                                    echo $row['白玫瑰']."朵白玫瑰";
                                }
                                if($row['向日葵']!=0){
                                    echo $row['向日葵']."朵向日葵";
                                }
                                if($row['康乃馨']!=0){
                                    echo $row['康乃馨']."朵康乃馨";
                                }
                                if($row['玛利亚']!=0){
                                    echo $row['玛利亚']."朵玛利亚";
                                }
                                ?></span><br>
                        </div><br>
                        <?php
                        if(!empty($data1)) {
                            foreach ($data1 as $value1) {
                                ?>
                                <div style="color: #828282;">
                                    <h3 style="font-size: 15px;font-weight: lighter;font-family: Times, serif, simhei;border-bottom: 1px solid black;">品牌故事<br><span>Composition</span></h3>
                                    <span><?php echo $value1['BrandStory']; ?></span><br>
                                </div><br>
                                <div style="color: #828282;">
                                    <h3 style="font-size: 15px;font-weight: lighter;font-family: Times, serif, simhei;border-bottom: 1px solid black;">保养说明<br><span>CareDescription</span></h3>
                                    <span><?php echo $value1['CareDescription']; ?></span><br>
                                </div><br>
                                <div style="color: #828282;">
                                    <h3 style="font-size: 15px;font-weight: lighter;font-family: Times, serif, simhei;border-bottom: 1px solid black;">运输说明<br><span>TransDescription</span></h3>
                                    <span><?php echo $value1['TransDescription']; ?></span><br>
                                </div><br>
                                <div style="color: #828282;">
                                    <h3 style="font-size: 15px;font-weight: lighter;font-family: Times, serif, simhei;border-bottom: 1px solid black;">退换货说明<br><span>ChangeDescription</span></h3>
                                    <span><?php echo $value1['ChangeDescription']; ?></span><br>
                                </div><br>
                                <?php
                            }
                        }
                        ?>
                    </div>
                    <?php
                }
            }
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