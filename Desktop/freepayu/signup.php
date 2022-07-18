

<!DOCTYPE html>
<html lang="zh-CN">
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>注册 | 自在巴渝</title>
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
    <body>
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
                        <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> 注册</a></li>
                        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> 登录</a></li>
                        <li><a href="comment.html"><span class="glyphicon glyphicon-comment"></span> 反馈</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid decor_bg" id="content">
            <div class="row">
                <div class="container">
                    <div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3">
                        <h2>注册</h2>
                        <form  action="registeration.php" method="POST">
                            <div class="form-group" >
                                <input class="form-control" placeholder="用户名" name="username"  required>
              
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control"  placeholder="请绑定电子邮箱"  name="email"  required>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="设置密码(6-16位)" name="password" required>
                            </div>
                            <div class="form-group">
                                <input type="repass" class="form-control" placeholder="请再次输入密码" name="re_password" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control"  placeholder="请输入手机号码" maxlength="11" size="11" name="phone" required>
                            </div>
                            <div class="form-group">
                                    <div style="text-align:center">
                           <input type="text" readonly placeholder="请点击选择城市" id="myAddrs" name="addr" data-key="4-84-1298" value="广东省 深圳市 龙华区" />
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
                            </div>
                            <div class="form-group">
                                <input  type="text" class="form-control"  placeholder="请输入你的收货地址" name="address" required>
                            </div>
                    
                            <label><input type="text" value="" name="checkNum" placeholder="请输入验证码"></label>      
                            <img src="validcode.php" style="width:100px;height:25px;" id="code"/>
                            <p> <a href="javascript:changeCode()">看不清，换一张</a></p>
                            <script src="http://libs.baidu.com/jquery/1.9.1/jquery.min.js"></script>             
                            <script type="text/javascript">
                            
                                function changeCode() {
                            
                                    document.getElementById("code").src = "validcode.php?id=" + Math.random();      //调用百度api使用验证码
                                }
                            
                            
                                $(document).keyup(function(event){ 
                                            if(event.keyCode ==13){ 
                                            $("#submit").trigger("click"); 
                                            } 
                                        });                                                              
                                
                              </script>

                               <tr><button type="submit" name="submit" class="btn btn-primary">确认注册</button></tr>         
                        </form>             
                        <script>
                            var form = document.querySelector('form');
                            var username = document.querySelector('[name="username"]');
                            var password = document.querySelector('[name="password"]');
                            var repass = document.querySelector('[name="re_password"]');
                            var tel = document.querySelector('[name="tel"]');
                            var email = document.querySelector('[name="e-mail"]');
                            var checkNum = document.querySelector("input[name='checkNum']").val();
                            var verticode = document.querySelector("input[name='verticode']");
                            var btn1 = document.querySelector('[type="submit"]');
                            form.onsubmit = function(){
                                var reg = /^\w{2,12}$/;
                                if(!reg.test(username.value.trim())){
                                    alert('请正确输入用户名');
                                    return false;
                                }
                                var reg = /^\d{6,16}$/;
                                if(password.value.trim() !== re_password.value.trim()){
                                    alert('两次密码输入不一致');
                                    return false;
                                }
                                var reg = /^1[3-9]\d{11}$/;
                                if(!reg.test(tel.value.trim())){
                                    alert('请正确输入手机号');
                                    return false;
                                }
                                var reg = /^([1-9]\d{3,10}@qq|[a-zA-Z]\w{5,17}@(163|126|gmail|qq|huawei|cqupt))\.com$/;
                                if(!reg.test(email.value.trim())){
                                    alert('请正确输入邮箱');
                                    return false;
                                }
                                if (checkNum == undefined || checkNum == '') {
                                alert("请输入验证码");
                                  return false;
                                 }
                            
                                }

                            }
                        </script>
                        
                        <tr> <td colspan="2" align="center" style="color:red;font-size:10px;"> 
                         <!--提示信息--> <?php
                            $err = isset($_GET["err"]) ? $_GET["err"] : "";
                            switch ($err) {
                                case 1:
                                    echo "<script language=\"JavaScript\">alert(\"用户名已被注册!\");</script>";
                                    break;
                                
                                case 2:
                                    echo "<script language=\"JavaScript\">alert(\"邮箱已被注册!\");</script>";
                                    break;
                                case 3:
                                    echo "<script language=\"JavaScript\">alert(\"手机号已被注册!\");</script>";
                                    break;
                                case 4:
                                    echo "<script language=\"JavaScript\">alert(\"两次密码不一致!\");</script>";
                                    break;
                                case 5:
                                      echo "<script language=\"JavaScript\">alert(\"邮箱验证码错误!\");</script>";
                                  break;
                            } ?></td> </tr>

                    </div>  
                </div>
            </div>
        </div>
        <footer>
            <div class="container">
                <center>
                    <p>Copyright &copy;自在巴渝. All Rights Reserved 2022-2025 |  商业合作: +86 13364063027</p>
                </center>
            </div>
        </footer>
    </body>
</html>
