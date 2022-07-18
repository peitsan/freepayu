<?php
functioncodestr()
{   $arr=array_merge(range('a','b'),range('A','B'),range('0','9')); 
    shuffle($arr);
    $arr=array_flip($arr);
    $arr=array_rand($arr,6);
    $res='';
{   $res.=$v;}return$res;}
?>
<?php
 usePHPMailer\PHPMailer\PHPMailer;
 usePHPMailer\PHPMailer\Exception;
//调用PHPMailer组件，此处是你自己的目录，需要改写。
require'src/Exception.php';
require'src/PHPMailer.php';
require'src/SMTP.php';
$mail= newPHPMailer(true);
$email = isset($_POST['email']) ? $_POST['email'] : "";
Passing `true` enables exceptionstry{//服务器配置   
  $mail->CharSet ="UTF-8"; //设定邮件编码  
  $mail->SMTPDebug = 0; // 调试模式输出  
  $mail->isSMTP();// 使用SMTP   
  $mail->Host = 'smtp.126.com';// SMTP服务器    
  $mail->SMTPAuth = true; // 允许 SMTP 认证   
  $mail->Username = 'freepayu@126.com'; // SMTP 用户名  即邮箱的用户名   
  $mail->Password = 'TWOKUELGQMRYVUVP'; // SMTP 密码  部分邮箱是授权码(例如163邮箱)  4
  $mail->SMTPSecure = 'ssl'; // 允许 TLS 或者ssl协议    
    $mail->Port = 25; // 服务器端口 25 或者465 具体要看邮箱服务器支持    
    $mail->setFrom('freepayu.shop', '自在巴渝');  //发件人（以QQ邮箱为例）        
    $mail->addAddress($email, '亲爱的顾客');  // 收件人（$Email可以为变量传值，也可为固定值）    
    $mail->addAddress('reality3iiru@163.com');  //
    $mail->addReplyTo('freepayu@126.com', 'info'); //回复的时候回复给哪个邮箱 建议和发件人一致    
    $mail->addCC('freepayu@126.com'); //抄送   
    $mail->addBCC('freepayu@163.com'); //密送    //发送附件   
   $mail->addAttachment('/img/food/mht.jpeg'); // 添加附件    //
    $mail->addAttachment('img/food/zrhg.jpeg', 'new.jpg');    // 发送附件并且重命名        
    $yanzhen= codestr();  //此处为调用随机验证码函数（按照自己实际函数名改写）    
    Content    $mail->isHTML(true); // 是否以HTML文档格式发送  发送后客户端可直接显示对应HTML内容  
   $mail->Subject = '******身份登录验证';   
    $mail->Body    = 
        '<h1> 欢迎使用自在巴渝注册系统:</h1>
         <h3>您的身份验证码是:
         <span>'.$yanzhen.'</span>
         </h3>'. date('Y-m-d H:i:s');
    $mail->AltBody = '欢迎使用自在巴渝注册系统,您的身份验证码是：'.$yanzhen. date('Y-m-d H:i:s');
    $mail->send();  echo'验证邮件发送成功，请注意查收！';}
     catch(Exception $e) 
     {echo'邮件发送失败: ', $mail->ErrorInfo;}}?>
