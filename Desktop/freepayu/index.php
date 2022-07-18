
<!DOCTYPE html>
<html lang="zh-CN">
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="sogou_site_verification" content="bicFuPd11w" />
      <meta name="baidu-site-verification" content="code-Gu5OTLvKWx" />
        <link rel="shortcut icon" href="./img/icon.png" type="image/x-icon">
        <title>怡然自乐~自在巴渝~</title>
        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="css/style.css" rel="stylesheet">
        <!-- jQuery -->
        <script src="js/jquery.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
    </head>

    <body style="padding-top: 50px;">
        <!-- Header -->
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                        
                    </button>
                    <a class="navbar-brand" href="index.php">自在巴渝 </a>
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
        <!--Header end-->

        <div id="content">
            <!--Main banner image-->
            <div id = "banner_image">
                <div class="container">	
                    <center>
                        <div id="banner_content">
                            <h1>行 千 里 ，致 广 大！</h1>
                            <p>巴山楚水，人杰地灵，物产丰腴，驰名海内！</p>
                            <br/>
                            <a  href="login.php" class="btn btn-danger btn-lg active">点击了解!</a>
                        </div>
                    </center>
                </div>
            </div>
            <!--Main banner image end-->

            <!--Item categories listing-->
            <div class="container">
                <div class="row text-center" id="item_list">
                    <div class="col-sm-4">
                        <a href="products.php#foods" >
                            <div class="thumbnail">
                                <img src="img/food/hp1.jpeg" height="400px" width="600px" alt="">
                                <div class="caption">
                                    <h3>渝味·映像</h3>
                                    <p>川香四溢围桌聚，乡土人情随礼易！</p>
                                </div>
                            </div> 
                        </a>
                    </div>

                    <div class="col-sm-4">
                        <a href="tour.html#attractions" >
                            <div class="thumbnail">
                                <img src="img/tour/cqk3.jpeg" height="400px" width="600px" alt="">
                                <div class="caption">
                                    <h3>渝景·驻足</h3>
                                    <p>襟三江而带五湖，文旅民俗省心享！</p>
                                </div>
                            </div> 
                        </a>
                    </div>

                    <div class="col-sm-4">
                        <a href="./fashion/index.html#souvenir" >
                            <div class="thumbnail">
                                <img src="img/culture/cj.jpeg"	height="400px" width="600px" alt="">
                                <div class="caption">
                                    <h3>渝潮·瑰丽</h3>
                                    <p>江源交织致富经，菁英荟萃双城汇！</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!--Item categories listing end-->
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