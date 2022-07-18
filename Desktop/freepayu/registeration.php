<?php
// $Id:$ //声明变量
$username = isset($_POST['username']) ? $_POST['username'] : "";
$email = isset($_POST['email']) ? $_POST['email'] : "";
$password = isset($_POST['password']) ? $_POST['password'] : "";
$re_password = isset($_POST['re_password']) ? $_POST['re_password'] : "";
$phone = isset($_POST['phone']) ? $_POST['phone'] : "";
$city = isset($_POST['city']) ? $_POST['city'] : "";
$address = isset($_POST['address']) ? $_POST['address'] : "";
if ($password == $re_password) { //建立连接
    $conn = mysqli_connect("localhost", "3ixcshz29i222", "BLmfDJ8w5X", "3ixcshz29i222"); //准备SQL语句,查询用户名
    $sql_select = "SELECT username FROM usertext WHERE username = '$username'"; //执行SQL语句
    $ret = mysqli_query($conn, $sql_select);
    $row = mysqli_fetch_array($ret); //判断用户名是否已存在
    if ($username == $row['username']) { //用户名已存在，显示提示信
        header("Location:signup.php?err=1");
    }
    else if($email == $row['email']) { //已存在邮箱已被注册，显示提示信息
        header("Location:signup.php?err=2");
    }
    else if($phone == $row['phone']) { //已存在手机已被注册，显示提示信息

        header("Location:signup.php?err=3");
    }
    else { //用户名不存在，插入数据 //准备SQL语句
        $sql_insert = "INSERT INTO usertext(username,email,password,re_password,phone,city,address)
        VALUES('$username','$email','$password','$re_password','$phone','$city','$address')"; //执行SQL语句
        mysqli_query($conn, $sql_insert);
        echo "<script language=\"JavaScript\">alert(\"注册成功!\");</script>";
        header("Location:login.php");
    } //关闭数据库
    mysqli_close($conn);
} else {
    header("Location:signup.php?err=4");
} ?>
