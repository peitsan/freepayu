<?php
include_once("registeration.php");

$verify = stripslashes(trim($_GET['verify']));
$nowtime = time();
$query = mysqli_query("select id,token_exptime from t_user where status='0' and `token`='$verify'");
$row = mysqli_fetch_array($query);
if($row){
	if($nowtime>$row['token_exptime']){ //30min
		$msg = '您的激活有效期已过，请登录您的帐号重新发送激活邮件.';
	}else{
		mysqli_query("update t_user set status=1 where id=".$row['id']);
		if(mysqli_affected_rows($link)!=1) die(0);
		$msg = '激活成功！';
	}
}else{
	$msg = 'error.';
}
echo "请前往注册邮箱完成激活!,激活链接将在1小时后过期！"
echo $msg;
?>
