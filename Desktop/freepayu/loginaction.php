<?php
// $Id:$ //声明变量
session_start();
$email = isset($_POST['email']) ? $_POST['email'] : "";
$_SESSION['user']=$email;
$password = isset($_POST['password']) ? $_POST['password'] : "";
$remember = isset($_POST['remember']) ? $_POST['remember'] : ""; //判断用户名和密码是否为空
if (!empty($email) && !empty($password)) { //建立连接
    $conn = mysqli_connect('localhost', '3ixcshz29i222', 'BLmfDJ8w5X', '3ixcshz29i222'); //准备SQL语句
    $sql_select = "SELECT email,password FROM usertext WHERE email = '$email' AND password = '$password'"; //执行SQL语句
    $ret = mysqli_query($conn, $sql_select);
    $row = mysqli_fetch_array($ret); //判断用户名或密码是否正确
    if ($email == $row['email'] && $password == $row['password'])
    { //选中“记住我”
        if ($remember == "on")
        { //创建cookie
            setcookie("", $email, time() + 7 * 24 * 3600);
        } //开启session
        session_start(); //创建session
        $_SESSION['3ixcshz29i222'] = $email; //写入日志
        $ip = $_SERVER['REMOTE_ADDR'];
        $date = date('Y-m-d H:m:s');
        $info = sprintf("当前访问用户：%s,IP地址：%s,时间：%s /n", $email, $ip, $date);
        $sql_logs = "INSERT INTO logs(email,ip,date) VALUES('$email','$ip','$date')";
        //日志写入文件，如实现此功能，需要创建文件目录logs
        $f = fopen('./logs/' . date('Ymd') . '.log', 'a+');
        fwrite($f, $info);
        fclose($f); //跳转到loginsucc.php页面
        header("Location:loginsucc.php"); //关闭数据库,跳转至loginsucc.php
        mysqli_close($conn);
    }
    else
    {   
        //用户名或密码错误，赋值err为1
        header("Location:login.php?err=1");
    }
} else { //用户名或密码为空，赋值err为2
    header("Location:login.php?err=2");
} ?>
