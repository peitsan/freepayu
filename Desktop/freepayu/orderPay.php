<?php
include "connectSQL.php";
$OrderID=$_GET['orderID'];
$sql2="select * from orders where OrderID='$OrderID'";
$result2=mysqli_query($coon,$sql2);
$row2=mysqli_fetch_assoc($result2);
$sql="update orders set IsPaid='1' where OrderID='$OrderID'";
$user=$_SESSION['user'];


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
    <link rel="stylesheet" href="styles/index-style.css">
    <link rel="stylesheet" href="styles/allset.css">
    <link rel="stylesheet" href="styles/bootstrap.min.css">
    <link rel="stylesheet" href="styles/fontawesome-all.css">
    <link rel="shortcut icon" href="./img/icon.png" type="image/x-icon">
    <script src="scripts/bootstrap.min.js"></script>
    <script src="scripts/jquery-3.3.1.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>支付控件|自在巴渝</title>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
    <link href="PayTest_files/cashier.css" rel="stylesheet">
        <script src="PayTest_files/jquery.js"></script>
        <style>
            .banks{display: none}
            .banks li{position:relative;float: left;width:240px;padding-top: 5px}
        </style>



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



    <br>
    当前订单总价格为：<?php echo $row2['OrderPrice']; ?>

      </ul>
           	
                  <div class="main">
                <div class="typedemo" style="height:auto">
                    <div class="demo-pc">
                        <div class="pay-jd">
                         
                                <input type="hidden" id="orderNo" name="orderNo" value="$orderID">
                           
        <ul class="pay-infor pay-label-amount" style="    border: 0px;">
								
									 <li>支付金额：</li>
										  <li>
                                            <input value="<?php echo $row2['OrderPrice']; ?>" onclick="changeDis();" name="amount" id="amount1" type="radio"  checked="checked">
                                            <label id="lamount1" for="amount1"><span><strong><?php echo $row2['OrderPrice']; ?><span>元</span></strong></span></label>
                                        </li>
                        </ul>
                                <div class="two-step">
                                     <ul class="pay-label">
                                         <h2>支付通道：</h2>
                                         <li>
                                            <input value="alipay" name="payType" id="zfbaa" type="radio" disabled>
                                            <label style="border-style:dashed" title="支付宝不定金额收款码体验" id="zfbaal" for="zfbaa"><img src="PayTest_files/zhifubao.png" alt="支付宝不定金额收款码"><span id="zfbs">通用收款码</span></label>
                                        </li>  
                                                                           
                                        <li>
                                            <input value="wechat" name="payType" id="wx" type="radio" disabled>
                                            <label style="border-style:dashed" title="微信支付不定金额收款码体验"  id="wxzfl" for="wx"><img src="PayTest_files/weixin.png" alt="微信支付不定金额收款码"><span id="wxzfs">通用收款码</span></label>
                                        </li>
                                        
					<li>
                                            <input value="unipay" name="payType" id="unipay" type="radio" >
                                            <label title="云闪付" for="unipay"><img src="PayTest_files/yinlian.png" alt="云闪付不定金额收款码"><span>银联云闪付</span></label>
                                        </li>
                                        <li>
                                            <input value="bankapp" name="payType" id="unibank" type="radio" >
                                            <label title="银联转账" for="unipay"><img src="PayTest_files/yinlian.png" alt="云闪付不定金额收款码"><span>银联转账</span></label>
                                        </li>
                                       
                                    </ul>   

                                      <button onclick="pay();" style="margin-top:20px;margin-bottom: 20px;float:right" class="pcdemo-btn sbpay-btn">立即支付</button>       
                             
                                </div>
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    <script>
    
    var pay = function () {
        var amount =  $("input[name='amount']:checked").val(); 
        var payType =  $("input[name='payType']:checked").val(); 
        if(parseFloat(amount)<=0) return false;
        location.href = "zhifu_api_demo.php?amount=" + amount+"&payType=" + payType;
    };
    
        $("#ylzf").click(function () {
            $('.banks').show();
        });
        $("#zfbzf,#wxzf,#zfbsjzf,#kjbd,#qq,#jd,#qqpayh5,#zfbh5zf").click(function () {
            $('.banks').hide();
        });
		 $(document).ready(function () {
			$("#orderNo").val("T" + new Date().getTime()); //实际使用展示自己的订单号即可
			$("#orderSpan").text($("#orderNo").val());
			changeDis();
			if(!_isMobile()){
				$("#wxh5").attr("disabled","disabled");
				$("#wxh5l").css("border-style","dashed");
				$("#wxh5l").html("微信H5限手机浏览器");
			}
			if(!_isWX()){
				//$("#wxpayjsapi").attr("disabled","disabled");
				//$("#wxpayjsapil").css("border-style","dashed");
				$("#wxh5l").html("微信H5限手机浏览器");
			//	$("#wxpayjsapil").html("微信JSAPI限微信内体验");
			}
		});
		function changeDis(){
			var amount = $('input[name="amount"]:checked').val(); 
			var id = $('input[name="payType"]:checked').attr("id"); 
			if(amount=="0.1" || amount=="0.2"){
				$("#zfbaa").attr("disabled","disabled");
				$("#wx").attr("disabled","disabled");
				$("#zfbgm").removeAttr("disabled");
				$("#wxgm").removeAttr("disabled");
				$("#zfbgms").html("固码体验");
				$("#wxgms").html("固码体验");
				$("#zfbaal").css("border-style","dashed");
				$("#wxzfl").css("border-style","dashed");
				$("#zfbgml").css("border-style","solid");
				$("#wxgml").css("border-style","solid");
				if("zfbaa" == id || "wx" == id){
					$("#zfbgm").click();
				}
			}else{
				$("#zfbaa").removeAttr("disabled");
				$("#wx").removeAttr("disabled");
				$("#zfbs").html("支付宝");
				$("#wxzfs").html("微信支付");
				$("#zfbgm").attr("disabled","disabled");
				$("#wxgm").attr("disabled","disabled");
				$("#zfbgms").html("请选择0.1元体验");
				$("#wxgms").html("请选择0.1元体验");
				$("#zfbaal").css("border-style","solid");
				$("#wxzfl").css("border-style","solid");
				$("#zfbgml").css("border-style","dashed");
				$("#wxgml").css("border-style","dashed");
				if("zfbgm" == id || "wxgm" == id){
					$("#zfbaa").click();
				}
			}
		}
		

		function _isMobile(){
				var flag = navigator.userAgent.match(/(phone|pad|pod|iPhone|iPod|ios|iPad|Android|Mobile|BlackBerry|IEMobile|MQQBrowser|JUC|Fennec|wOSBrowser|BrowserNG|WebOS|Symbian|Windows Phone)/i)
		  	
		 		return flag;

		}
		function _isWX(){
				var flag = navigator.userAgent.match(/(MicroMessenger)/i)
		  	
		 		return flag;

		}
		 
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
