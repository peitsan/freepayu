<?php
/**
 * Created by PhpStorm.
 * User: yjry
 * Date: 2018/5/10
 * Time: 20:13
 */
include "connectSQL.php";
include "imageUpload.php";
$id=$_GET['userid'];
$username=$_POST['username'];
$password=$_POST['password'];
$password_c=$_POST['re_password'];
$usersex=$_POST['sex'];
$truename=$_POST['truename'];
$userage=$_POST['userage'];
$useremail=$_POST['email'];
$userphone=$_POST['phone'];
$city=$_POST['city'];
$useraddress=$_POST['address'];
$filepath = upload();
$IsRegister=0;
$updatesql = "update usertext set username='$username',truename='$truename',password='$password',sex='$usersex',userage='$userage',email='$useremail',phone='$userphone',password='$password',sex='$usersex',userage='$userage',email='$useremail',phone='$userphone',address='$useraddress',city='$city',
 UserImage='$filepath' where Id=$id";

if($username==""||$truename==""||$password==""||$password_c==""||$userage==""||$userphone==""||$useraddress=="")
    echo "<script>alert('用户信息填写不完整，请重新核实！');history.back();</script>";
else {
    if ($password != $password_c)
        echo "<script>alert('您输入的两次密码不一致，请重新输入！');history.back();</script>";
    else {
        if ($result = mysqli_query($coon, "select * from usertext where id=$id")) {
            $row = mysqli_fetch_assoc($result);
            if ($row['UserName'] == $username) {
                if (mysqli_query($coon, $updatesql)) {
                    if(mysqli_affected_rows($coon))
                        echo "<script>alert('修改用户信息成功');window.location.href='userInfo.php';</script>";
                    else
                        echo "<script>alert('用户信息没有作更改！');window.location.href='userInfo.php';</script>";
                }
                else {
                    echo "<script>alert('修改用户信息失败');window.location.href='userInfo.php';</script>";
                }
            }
            else {
                if ($result = mysqli_query($coon, 'SELECT * FROM usertext')) {//读取数据
                    while ($row = mysqli_fetch_assoc($result)) {
                        if ($row['UserName'] == $username) {
                            $IsRegister = 1;
                        }
                    }
                    if ($IsRegister != 0) {//用户名重复
                        echo "<script>alert('用户名已存在！请重新输入');history.back();</script><br>";
                    }
                    else {//用户名不存在，可以创建!
                        if (mysqli_query($coon, $updatesql)) {
                            echo "<script>alert('修改用户信息成功');window.location.href='userInfo.php';</script>";
                        }
                        else {
                            echo "<script>alert('修改用户信息失败');window.location.href='userInfo.php';</script>";
                        }
                    }
                }
            }
        }
    }
}