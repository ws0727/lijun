<?php
namespace application\admin\controller;
use framework\core\Controller;
use think\Db;

class UserController extends Controller{
    public function index(){
        //取总页数
        $count=Db("user")->count();
        //每页展示2条
        $pagesum=ceil($count/2);
        //取得所有分类
        $user=Db("user")->field("user.user_id,user_name,user_status,user_email,user_phone")->order("user.user_id desc")->select();
         foreach($user as $key=>$value){
             $userinfo=Db("userinfo")->where(["user_id"=>$value["user_id"]])->find();
             //两个字符串合并
             $user[$key]=array_merge($value,$userinfo);
         }
        //var_dump($user);
        view("",["user"=>$user,"pagesum"=>$pagesum]);
   }
    public function updateStatus(){
        config("debug",false);
        //接值
        if(request()->isPost()){
            $user_id=request()->post("user_id","");
            $user_status=request()->post("user_status","");
            //接过来的值准备入库修改0&1,然后插入数据库
            $data["user_status"]=$user_status==0?1:0;
            if(Db("user")->where(["user_id"=>$user_id])->update($data)){
                echo json_encode(["status"=>1,"msg"=>"ok"]);
            }else{
                echo json_encode(["status"=>0,"msg"=>"修改失败"]);
            }
        }
    }

  //搜索
    public function search(){
        config("debug",false);
        $where="1";
        $user_phone=$this->request->post("user_phone","");
        if(!empty($user_phone)){
            $where.=" and user_phone like '".$user_phone."%'";
        }

        $user_email=$this->request->post("user_email");
        if(!empty($user_email)){
            $where.=" and user_email like '%".$user_email."%'";
        }

        $user_status=$this->request->post("user_status",-1);
        if($user_status!=-1){
            $where.=" and user_status=".$user_status;
        }
        //取得所有分类
        $p=$this->request->get("p",1);
        $start=($p-1)*1;
        $user=Db("user")->field("user.user_id,user_name,user_status,user_email,user_phone")->where($where)->order("user.user_id desc")->limit($start,2)->select();

        foreach($user as $key=>$value){
            $userinfo=Db("userinfo")->where(["user_id"=>$value["user_id"]])->find();
            //两个字符串合并
            $user[$key]=array_merge($value,$userinfo);
        }
        //取带条件的总条数
        $count=Db("user")->where($where)->count();
        $pagesum=ceil($count/1);
        if($user){
            echo json_encode(["status"=>1,"msg"=>"ok","content"=>$user,"pagesum"=>$pagesum]);
        }else{
            echo json_encode(["status"=>0,"msg"=>"没有搜到相关数据"]);
        }
    }


 //分页
    public function page(){
       config("debug",false);

        $where="1";
        $user_phone=$this->request->get("user_phone","");
        if(!empty($user_phone)){
            $where.=" and user_phone like '".$user_phone."%'";
        }

        $user_email=$this->request->get("user_email");
        if(!empty($user_email)){
            $where.=" and user_email like '%".$user_email."%'";
        }

        $user_status=$this->request->get("user_status",-1);
        if($user_status!=-1){
            $where.=" and user_status=".$user_status;
        }
       $p=request()->get("p");
       $start=($p-1)*1;
        //取得所有分类
        $user=Db("user")->field("user.user_id,user_name,user_status,user_email,user_phone")->where($where)->order("user.user_id desc")->limit($start,2)->select();
        foreach($user as $key=>$value){
            $userinfo=Db("userinfo")->where(["user_id"=>$value["user_id"]])->find();
            //两个字符串合并
            $user[$key]=array_merge($value,$userinfo);
        }
        if($user){
            echo json_encode(["status"=>1,"msg"=>"ok","content"=>$user]);
        }else{
            echo json_encode(["status"=>0,"msg"=>"no ok"]);
        }
    }
}