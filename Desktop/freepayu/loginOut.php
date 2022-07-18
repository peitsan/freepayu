<?php

session_start();
$_SESSION=[];
if(ini_get('session.use_cookies')){
    $params=session_get_cookie_params();
    setcookie(session_name(),'',time()-1,$params['path'],$params['domain'],$params['secure'],$params['httponly']);
}
session_destroy();
echo "<script>alert('用户已注销');location.href='login.php';</script>";
