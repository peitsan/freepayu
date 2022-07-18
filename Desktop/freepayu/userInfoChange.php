<?php
/**
 * Created by PhpStorm.
 * User: yjry
 * Date: 2018/4/28
 * Time: 18:16
 */
session_start();
include "connectSQL.php";
$id=$_GET['userid'];
$user=$_SESSION['user'];
$sql="select * from usertext where Id=$id";
if($result=mysqli_query($coon,$sql)){
    $data=mysqli_fetch_assoc($result);
}
if($user!='') {
    $sql1 = "select * from usertext where UserName='$user'";
    $result1 = mysqli_query($coon, $sql1);
    $row1 = mysqli_fetch_assoc($result1);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>修改信息| 自在巴渝</title>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link rel="shortcut icon" href="./img/icon.png" type="image/x-icon">
        <link href="css/style.css" rel="stylesheet">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/bootstrap.js"></script>
      
<script src="https://wurenzhi.com/script/inputCookie.js"></script>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            
            <meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no" name="viewport">
            <meta content="yes" name="apple-mobile-web-app-capable">
            <meta content="black" name="apple-mobile-web-app-status-bar-style">
            <meta content="telephone=no" name="format-detection">
            <meta content="email=no" name="format-detection">
            
            <link href="css/scs.min.css" rel="stylesheet" />
            <style>
            #myAddrs {
                width: 100%;
                font-size: 16px;
                border: 1px solid #bababa;
                border-radius: 4px;
                padding: 5px;
                margin-top: 5                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  px;
                color: gray;
            }
            </style>
</head>
<body style="margin: 0 auto;background-repeat:no-repeat; -webkit-background-size: 100%;background-size: 100%;">
	
<div class="content">
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
		<hr>
    <div>
         <h3>用户信息修改</h3>
    <form method="post" action="userInfoChangeHandle.php?userid=<?php echo $id;?>" role="form" enctype="multipart/form-data" style="width: 300px;margin: 0 auto; margin-top: 60px;">
        <div class="form-group">
            <label class="control-label" for="username">用户名：</label>
            <input class="form-control" type="text" name="username" size="20" value="<?php echo $data['UserName']; ?>">
        </div>
        <div class="form-group">
            <label class="control-label" for="truename">真实姓名：</label>
            <input class="form-control" type="text" name="truename" size="20" value="<?php echo $data['TrueName']; ?>">
        </div>
        <div class="form-group">
            <label class="control-label" for="password">密码：</label>
            <input class="form-control" type="password" name="password" size="20" value="<?php echo $data['Password']; ?>">
        </div>
        <div class="form-group">
            <label class="control-label" for="re_password">确认密码：</label>
            <input class="form-control" type="password" name="re_password" size="20" placeholder="请再次输入密码：">
        </div>
        <div class="form-group">
            <label class="control-label" for="sex">性别：</label>
            <select class="form-control" name="sex">
                <option value ="男" <?php if($data['Sex']=='男')echo "selected='selected'";else echo "";?>>男</option>
                <option value ="女" <?php if($data['Sex']=='女')echo "selected='selected'";else echo "";?>>女</option>
                <option value="保密" <?php if($data['Sex']=='保密')echo "selected='selected'";else echo "";?>>保密</option>
            </select>
        </div>
        <div class="form-group">
            <label class="control-label" for="userage">年龄：</label>
            <input class="form-control" type="text" name="userage" value="<?php echo $data['UserAge']; ?>">
        </div>
        <div class="form-group">
            <label class="control-label" for="email">邮箱：</label>
            <input class="form-control" type="text" name="email" value="<?php echo $data['email']; ?>">
        </div>
        <div class="form-group">
            <label class="control-label" for="phone">联系电话：</label>
            <input class="form-control" type="text" name="phone" value="<?php echo $data['Phone']; ?>">
        </div>
        <div class="form-group">
            <label class="control-label" for="address">常用地址：</label>
            <div class="form-group">
                                    <div style="text-align:center">
                           <input type="text" readonly placeholder="请点击选择城市" id="myAddrs" name="city" data-key="4-84-1298" value="<?php echo $data['city']; ?>" />
                                             </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.scs.min.js"></script>
    <script src="js/CNAddrArr.min.js"></script>
    <script>
    $(function() {
        /**
         * 通过数组id获取地址列表数组
         *
         * @param {Number} id
         * @return {Array} 
         */ 
        function getAddrsArrayById(id) {
            var results = [];
            if (addr_arr[id] != undefined)
                addr_arr[id].forEach(function(subArr) {
                    results.push({
                        key: subArr[0],
                        val: subArr[1]
                    });
                });
            else {
                return;
            }
            return results;
        }
        /**
         * 通过开始的key获取开始时应该选中开始数组中哪个元素
         *
         * @param {Array} StartArr
         * @param {Number|String} key
         * @return {Number} 
         */         
        function getStartIndexByKeyFromStartArr(startArr, key) {
            var result = 0;
            if (startArr != undefined)
                startArr.forEach(function(obj, index) {
                    if (obj.key == key) {
                        result = index;
                        return false;
                    }
                });
            return result;
        }

        //bind the click event for 'input' element
        $("#myAddrs").click(function() {
            var PROVINCES = [],
                startCities = [],
                startDists = [];
            //Province data，shall never change.
            addr_arr[0].forEach(function(prov) {
                PROVINCES.push({
                    key: prov[0],
                    val: prov[1]
                });
            });
            //init other data.
            var $input = $(this),
                dataKey = $input.attr("data-key"),
                provKey = 1, //default province 北京
                cityKey = 36, //default city 北京
                distKey = 37, //default district 北京东城区
                distStartIndex = 0, //default 0
                cityStartIndex = 0, //default 0
                provStartIndex = 0; //default 0

            if (dataKey != "" && dataKey != undefined) {
                var sArr = dataKey.split("-");
                if (sArr.length == 3) {
                    provKey = sArr[0];
                    cityKey = sArr[1];
                    distKey = sArr[2];

                } else if (sArr.length == 2) { //such as 台湾，香港 and the like.
                    provKey = sArr[0];
                    cityKey = sArr[1];
                }
                startCities = getAddrsArrayById(provKey);
                startDists = getAddrsArrayById(cityKey);
                provStartIndex = getStartIndexByKeyFromStartArr(PROVINCES, provKey);
                cityStartIndex = getStartIndexByKeyFromStartArr(startCities, cityKey);
                distStartIndex = getStartIndexByKeyFromStartArr(startDists, distKey);
            }
            var navArr = [{//3 scrollers, and the title and id will be as follows:
                title: "省",
                id: "scs_items_prov"
            }, {
                title: "市",
                id: "scs_items_city"
            }, {
                title: "区",
                id: "scs_items_dist"
            }];
            SCS.init({
                navArr: navArr,
                onOk: function(selectedKey, selectedValue) {
                    $input.val(selectedValue).attr("data-key", selectedKey);
                }
            });
            var distScroller = new SCS.scrollCascadeSelect({
                el: "#" + navArr[2].id,
                dataArr: startDists,
                startIndex: distStartIndex
            });
            var cityScroller = new SCS.scrollCascadeSelect({
                el: "#" + navArr[1].id,
                dataArr: startCities,
                startIndex: cityStartIndex,
                onChange: function(selectedItem, selectedIndex) {
                    distScroller.render(getAddrsArrayById(selectedItem.key), 0); //re-render distScroller when cityScroller change
                }
            });
            var provScroller = new SCS.scrollCascadeSelect({
                el: "#" + navArr[0].id,
                dataArr: PROVINCES,
                startIndex: provStartIndex,
                onChange: function(selectedItem, selectedIndex) { //re-render both cityScroller and distScroller when provScroller change
                    cityScroller.render(getAddrsArrayById(selectedItem.key), 0);
                    distScroller.render(getAddrsArrayById(cityScroller.getSelectedItem().key), 0);
                }
            });
        });
    });
    </script>
            <input class="form-control" type="text" name="address" value="<?php echo $data['Address']; ?>">
        </div>
        <div class="form-group">
            <label class="control-label" for="userimage">用户头像：</label>
            <input class="form-control" type="file" name="userimage">
        </div>
        <button class="btn btn-info" type="submit">提交修改</button>
    </form>
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
