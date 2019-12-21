<?php
namespace application\home\controller;

use framework\core\Controller;
use framework\core\Session;
use Qiniu\Auth;
use Qiniu\Storage\UploadManager;
use think\Db;

class UserController extends Controller{
    public function userinfo(){
        //根据ask表里的cate_id查出问题的所属分类
        $session=Session::get("user");
        //根据用户ID查询user表
        $user=Db("user")->where(["user_id"=>$session["user_id"]])->find();
        //根据用户ID查询userinfo表
        $userinfo=Db("userinfo")->where(["user_id"=>$session["user_id"]])->find();
        //将两个表和为一个一维数组
        $user=array_merge($userinfo,$user);
        $ask=Db("ask")->select();
        $count=Db("ask")->count();
        view("",["ask"=>$ask,"count"=>$count,"user"=>$user]);
    }




    public function face(){
        $user_id=Session::get("user")["user_id"];
        config("debug",false);
        if(request()->isGet()){
            $ask=Db("ask")->select();
            $count=Db("ask")->count();
            $cate=Db("cate")->where(["cate_pid"=>0])->select();
            $user=Db("user")->where(["user_id"=>$user_id])->find();
            view("",["user"=>$user,"ask"=>$ask,"count"=>$count,"cate"=>$cate]);
        }
        if($this->request->isPost()){
            $face=$_FILES["file"];
            if(empty($face["name"])){
                echo json_encode(["status"=>2,"msg"=>"没有图片上传"]);
                exit;
            }
            require_once FRAMEWORK_CORE_PATH."vendor/autoload.php";
            $accessKey ="l-wOlHSksAD81xQD5j-mJ-dHYSeNR6dag_lE-lrq";
            $secretKey = "FCuw240ErQwGgCBTQO_AGntCqHFIzfoVt3Z_Fc9_";
            $bucket = "lijun-qwertyuiop";
            // 构建鉴权对象
            $auth = new Auth($accessKey, $secretKey);
            // 生成上传 Token
            $token = $auth->uploadToken($bucket);
            // 要上传文件的本地路径
            $filePath = $face['tmp_name'];
            // 上传到七牛后保存的文件名
            $ext=pathinfo($face['name'],PATHINFO_EXTENSION);
            $key = uniqid().".".$ext;
            // 初始化 UploadManager 对象并进行文件的上传。
            $uploadMgr = new UploadManager();
            // 调用 UploadManager 的 putFile 方法进行文件的上传。
            list($ret,$err)= $uploadMgr->putFile($token, $key, $filePath);
            if($err===null){
                $path="http://py10a0hp3.bkt.clouddn.com/".$ret['key'];
                Db("user")->where(["user_id"=>$user_id])->update(["user_face"=>$path]);
                echo json_encode(["status"=>"1","msg"=>"ok","path"=>$path]);
            }else{
                echo json_encode(["status"=>"0","msg"=>"上传失败"]);
            }
         }
    }
}















