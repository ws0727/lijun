<?php
namespace application\home\controller;
use framework\core\Controller;
use framework\core\Cookie;
use framework\core\ErrorException;
use framework\core\Session;
use framework\core\Validate;
use think\Db;


class LoginController extends Controller{

 //登录
    public function login(){
        config("debug",true);
        if(request()->isPost()){
            //接值
            $sign_name=request()->post("sign_name","");
            $sign_pwd=request()->post("sign_pwd","");
            //验证
            if(empty($sign_name)){
                $this->error('用户账号不能为空');
            }
            if(empty($sign_pwd)){
                $this->error('用户密码不能为空');
            }
            $reg_phone='/^1[3456789]\d{9}$/';
            $reg_email='/^\w+@[a-z0-9]+\.[a-z]{2,4}$/';
            //将接受到的值使用上面的两个正则一一进行验证
            if(preg_match($reg_phone,$sign_name)){
                $sult=Db("user")->field("user_sult")->where(["user_phone"=>$sign_name])->find();
//                var_dump($sult);
                $pwd=md5(md5($sign_pwd).$sult["user_sult"]);
                $data=Db("user")->field("user_id,user_name")->where(["user_phone"=>$sign_name,"user_pwd"=>$pwd])->find();
            }

            if(preg_match($reg_email,$sign_name)){
                $sult=Db("user")->where(["user_email"=>$sign_name])->find();
                $pwd=md5(md5($sign_pwd).$sult["user_sult"]);
                $data=Db("user")->field("user_id,user_name")->where(["user_email"=>$sign_name,"user_pwd"=>$pwd])->find();
            }

           if($data){
                Session::add("user",$data);
                $this->success("登录成功",url("index/index"));
            }else{
                $this->error("登录失败");
            }
        }

    }





    //注册
    public function register(){
        if(request()->isPost()){
            $code=request()->post("code","");
            $user_account=$this->request->post("user_account","");
            $user_pwd=$this->request->post("user_pwd","");
            $user_repwd=$this->request->post("user_repwd","");
            $code_msg=Session::get("code_msg");
            if(time()-$code_msg['time']>60){
                $this->error("验证码超时");
            }
             if($user_account!=$code_msg['user_account']){
                 $this->error("与验证码账号不一致");
             }
            if($code!=$code_msg["code"]){
                $this->error("验证码错误");
            }
           Session::delete("code_msg");
            //验证用户，密码，确认密码

            $data["user_name"]=$user_account."_".rand(2222,3333);
            $data["user_sult"]=substr(uniqid(),-4);
            $data["user_pwd"]=md5(md5($user_pwd).$data["user_sult"]);
            //验证
            $reg_phone='/^1[345789]\d{9}$/';
            $reg_email='/^\w+@\w+\.(com|cn)$/';
            $userModel=D("User");
            if(preg_match($reg_phone,$user_account)){
                $data["user_phone"]=$user_account;
            }
            if(preg_match($reg_email,$user_account)){
                $data["user_email"]=$user_account;
            }
            if($user_id=$userModel->add($data)){
                $userinfo["user_gold"]=config("register_gold");
                $userinfo["user_exp"]=config("register_exp");
                $userinfo["user_id"]=$user_id;
                $userinfo["user_reg_time"]=time();
                Db("userinfo")->add($userinfo);
                $user=["user_id"=>$user_id,"user_name"=>$data["user_name"]];
                Session::add("user",$user);
                $this->error("注册成功");
               }else{
                $this->error("注册失败");
            }
        }
    }






    //退出
    public function logout(){
        Session::delete("user");
        Cookie::delete("user");
        $this->success("退出成功",url('index/index'));

    }
    //验证账号唯一性
    public function checkAccount(){
        config("debug",false);
        //接值
        $user_account=request()->get("user_account","");
        //验证
        $reg_phone='/^1[345789]\d{9}$/';
        $reg_email='/^\w+@\w+\.(com|cn)$/';
        $userModel=D("User");
        if(preg_match($reg_phone,$user_account)){
            $res=$userModel->where(["user_phone"=>$user_account])->find();
        }
        if(preg_match($reg_email,$user_account)){
            $res=$userModel->where(["user_email"=>$user_account])->find();
        }
        if($res){
            echo json_encode(["status"=>1,"msg"=>"用户名已存在"]);
        }else{
            echo json_encode(["status"=>0,"msg"=>"ok"]);
        }
    }



    //发送短信
    public function sendMsg(){
        config("debug",false);
        //接值
        $user_account=request()->get("user_account","");
        //验证
        $reg_phone='/^1[345789]\d{9}$/';
        $reg_email='/^\w+@\w+\.(com|cn)$/';
        $userModel=D("User");
        //发送到手机上
        $code=rand(1000,9999);
        //存session(存验证码和手机号)
        Session::add("code_msg",["code"=>$code,"user_account"=>$user_account,"time"=>time()]);
        if(preg_match($reg_phone,$user_account)){
           //发送到手机
            $data=$userModel->sendCodeToPhone($user_account,$code);
            $arr=json_decode($data,true);
            if($arr["success"]==1){
                echo json_encode(["status"=>1,"msg"=>"ok"]);
            }else{
                echo json_encode(["status"=>0,"msg"=>"发送失败"]);
            }
        }
        if(preg_match($reg_email,$user_account)){




     //发送到邮箱
            $data=$userModel->sendCodeToEmail($user_account,$code);
            if($data){
                echo json_encode(["status"=>1,"msg"=>"ok"]);
            }else{
                echo json_encode(["status"=>0,"msg"=>"发送失败"]);
            }
        }
    }












    //QQ登录
    public function qq_login(){
       //获取accessToken
        $url='https://graph.qq.com/oauth2.0/authorize';
        $param=[
          "response_type"=>'code',
          'client_id'=>'101706648',
          'redirect_uri'=>'http://www.zhaowei.shop/index.php/home/login/qq_callback',
          'state'=>"zhangsan"
        ];
        $param=http_build_query($param);
        header("Location:".$url."?".$param);
    }
    public function qq_callback(){
     if(request()->get("state","")=="zhangsan"){
         $code=request()->get("code","");
         $url='https://graph.qq.com/oauth2.0/token';
         $param=[
             'grant_type'=>"authorization_code",
             'client_id'=>'101706648',
             'client_secret'=>'35dce26da88e731775ca72182ced9101',
             'code'=>$code,
             'redirect_uri'=>'http://www.zhaowei.shop/index.php/home/login/qq_callback'
         ];
         $data=file_get_contents($url."?".http_build_query($param));
         if(strpos($data,'access_token')===0){
             parse_str($data,$arr);
             $access_token=$arr['access_token'];
             $data=file_get_contents("https://graph.qq.com/oauth2.0/me?access_token=".$access_token);
             preg_match('/^callback\(\s*(\{.*\})\s*\);$/',$data,$arr);
             if(!isset($arr[1])){
                 throw new ErrorException("非法请求");
             }
             $data=json_decode($arr[1],true);
             $openid=$data["openid"];
             $oauth=Db("oauth")->where(["oauth_openid"=>$openid])->find();

             if($oauth){
               //查询用户是否绑定
                 if($oauth["user_id"]){
                   //查寻有无绑定账号，有就存入Session,否则就跳转绑定界面
                     $user=Db("user")->where(["user_id"=>$oauth["user_id"]])->find();
                     Session::add("user",$user);
                     Session::add("openid",$openid);
                     $this->redirect(url("Index/index"));
                 }else{
                   //跳转到绑定界面
                     Session::add("openid",$openid);
                     $this->redirect(url("Login/bind"));
                 }
             }else{
              //添加新用户然后跳转绑定界面
                Db("oauth")->add(["oauth_type"=>'qq',"oauth_openid"=>$openid]);
                 $this->redirect(url("Login/bind"));
             }
         }else{
             throw new ErrorException("非法请求");
         }
     }else{
         throw new ErrorException("非法请求");
     }
 }









    //绑定账号
    public function bind(){
        if($this->request->isGet()){
            $openid=Session::get("openid","");
            Session::delete("openid");
            if(empty($openid)){
                $this->success("非法请求",url("Index/index"));
            }
            view("",["openid"=>$openid]);
        }
        if($this->request->isPost()){
           //接值

            $code=request()->post("code","");
            $user_account=$this->request->post("user_account","");
            $code_msg=Session::get("code_msg");
            $openid=$this->request->post("openid");
            if(time()-$code_msg['time']>60){
                $this->error("验证码超时");
            }
            if($user_account!=$code_msg['user_account']){
                $this->error("与验证码账号不一致");
            }
            if($code!=$code_msg["code"]){
                $this->error("验证码错误");
            }
            Session::delete("code_msg");

            //验证
            $data["user_name"]=$user_account."_".rand(2222,3333);
            $reg_phone='/^1[345789]\d{9}$/';
            $reg_email='/^\w+@\w+\.(com|cn)$/';
            $userModel=D("User");

            if(preg_match($reg_phone,$user_account)){
                $data["user_phone"]=$user_account;
                $data=Db("user")->where(["user_phone"=>$user_account])->find();
            }
            if(preg_match($reg_email,$user_account)){
                $data["user_email"]=$user_account;
                $data=Db("user")->where(["user_email"=>$user_account])->find();
            }
            if($data){
                $res = Db("oauth")->where(["oauth_openid" => $openid])->update(["user_id" => $data["user_id"]]);
                if($res){
                    Session::add("user", ["user_id" => $data["user_id"], "user_name" => $data["user_name"]]);
                    $this->success("绑定成功",url("index/index"));
                }else{
                    $this->error("绑定失败");
                }
            }else{
               //
            }
        }
    }



    //验证账号唯一性
    public function checkAccounts(){
        config("debug",false);
        //接值
        $user_account=request()->get("user_account","");
        //验证
        $reg_phone='/^1[345789]\d{9}$/';
        $reg_email='/^\w+@\w+\.(com|cn)$/';
        $userModel=D("User");
        if(preg_match($reg_phone,$user_account)){
            $res=$userModel->where(["user_phone"=>$user_account])->find();
        }
        if(preg_match($reg_email,$user_account)){
            $res=$userModel->where(["user_email"=>$user_account])->find();
        }
        if($res){
            echo json_encode(["status"=>1,"msg"=>"用户名已存在"]);
        }else{
            echo json_encode(["status"=>0,"msg"=>"ok"]);
        }
    }


    //发送短信
    public function sendMsgs(){
        config("debug",false);
        //接值
        $user_account=request()->get("user_account","");
        //验证
        $reg_phone='/^1[345789]\d{9}$/';
        $reg_email='/^\w+@\w+\.(com|cn)$/';
        $userModel=D("User");
        //发送到手机上
        $code=rand(1000,9999);
        //存session(存验证码和手机号)
        Session::add("code_msg",["code"=>$code,"user_account"=>$user_account,"time"=>time()]);
        if(preg_match($reg_phone,$user_account)){
            //发送到手机
            $data=$userModel->sendCodeToPhone($user_account,$code);
            $arr=json_decode($data,true);
            if($arr["success"]==1){
                echo json_encode(["status"=>1,"msg"=>"ok"]);
            }else{
                echo json_encode(["status"=>0,"msg"=>"发送失败"]);
            }
        }
        if(preg_match($reg_email,$user_account)){
            //发送到邮箱
            $data=$userModel->sendCodeToEmail($user_account,$code);
            if($data){
                echo json_encode(["status"=>1,"msg"=>"ok"]);
            }else{
                echo json_encode(["status"=>0,"msg"=>"发送失败"]);
            }
        }
    }
}
?>