<?php
namespace application\home\model;
use framework\core\Curl;
use framework\core\Model;

class User extends Model{
  public function sendCodeToPhone($phone,$code){
    $param=[
      "tempid"=>51729,
      "param"=>urlencode("wed=快简科技&code=".$code),
      "phone"=>$phone,
      "appkey"=>config("k780_app_key"),
      "sign"=>config("k780_app_sign"),
      "format"=>"json"
    ];

    $data=Curl::postUrl("http://api.k780.com?app=sms.send",$param);
    return $data;
  }
  //发送邮件
  public function sendCodeToEmail($email,$code){
    require_once(FRAMEWORK_CORE_PATH."mailer/class.phpmailer.php");

        $mail= new \PHPMailer();

        $mail->IsSMTP();                        //设置使用SMTP服务器发送
        $mail->SMTPAuth   = true;               //开启SMTP认证
        $mail->Host       = 'smtp.163.com';   	    //设置 SMTP 服务器,自己注册邮箱服务器地址

		$mail->Username   = 'lijun12293316';  		//发信人的邮箱名称
		$mail->Password   = 'lijun122933161';          //发信人的邮箱密码授权码

		/*内容信息*/
		$mail->IsHTML(true); 			         //指定邮件格式为：html/text
		$mail->CharSet    ="UTF-8";			     //编码
		$mail->From       = 'lijun12293316@163.com';	 		 //发件人完整的邮箱名称
		$mail->FromName   = '李俊';			 //发信人署名
		$mail->Subject    = "问答系统验证码";  			 //信的标题
		$mail->MsgHTML("尊敬的用户：您在问答系统上的注册验证码是:".$code);  				 //发信主体内容
        /*发送邮件*/
		$mail->AddAddress($email);  			 //收件人地址
        //使用send函数进行发送
		if($mail->Send()) {
		  	return true;
		} else {
            return false;
		}
  }
}