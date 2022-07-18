<!DOCTYPE html>
<html lang="zh-CN">

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<meta name="sogou_site_verification" content="bicFuPd11w" />
        <link rel="shortcut icon" href="./img/icon.png" type="image/x-icon">
        <title>登录 | 自在巴渝</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
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
        <div id="content">
            <div class="container-fluid decor_bg" id="login-panel">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="panel panel-primary" >
                            <div class="panel-heading">
                                <h4>登录</h4>
                            </div>
                            <div class="panel-body">
                                <tr> <td
                                    colspan="2" align="center" style="color:red;font-size:10px;"> 
                                 <!--提示信息--> <?php
                                    $err = isset($_GET["err"]) ? $_GET["err"] : "";
                                    switch ($err) {
                                        case 1:
                                            echo "用户名或密码错误！";
                                            break;
                                    
                                        case 2:
                                            echo "用户名或密码不能为空！";
                                            break;
                                    } ?></td> </tr> 
                                <p class="text-warning"><i>登录您的账号</i><p>
                                <form role="form" action="loginaction.php" method="POST">
                                    <div class="form-group">
                                        <input type="email" class="form-control" value="<?php
                                        echo isset($_COOKIE[""]) ? $_COOKIE[""] : ""; ?>" placeholder="请输入电子邮箱" name="email" required >
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="请输入密码" name="password" required>
                                    </div>
                                    <label><input type="text" value="" name="checkNum" placeholder="请输入验证码"></label>
                                     <img src="validcode.php" style="width:100px;height:25px;" id="code"/>
                                   <a href="javascript:changeCode()">看不清，换一张</a>
                                   <script src="http://libs.baidu.com/jquery/1.9.1/jquery.min.js"></script>
                                    <script type="text/javascript">
                                        //点击图片更新验证码
                                        function changeCode() {
                            
                                        document.getElementById("code").src = "validcode.php?id=" + Math.random();
                                        }
                                        //敲击空格提交请求
                                        $(document).keyup(function(event){ 
                                            if(event.keyCode ==13){ 
                                            $("#submit").trigger("click"); 
                                            } 
                                        });
                                        </script>
                                   <tr> <td colspan="2"> <input type="checkbox" name="remember"><small>记住我 </td> </tr> 
                                    <button type="submit" name="submit" class="btn btn-primary">确认登录</button><br><br>
                                </form><br/>
                            </div>
                            <div class="panel-footer"><p>还没有账号? <a href="signup.php">注册</a>一个吧！</p></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer>
            <div class="container">
                <center>
                 <p> Copyright &copy;自在巴渝. All Rights Reserved 2022-2025 |  商业合作: +86 13364063027 </p>
                </center>
            </div>
        </footer>
    </body>
</html>
