<?php
namespace application\admin\controller;
use framework\core\Controller;
use framework\core\Session;

class CategoryController extends Controller{
    public function index(){
        $session=Session::get("user")["user_id"];
        //查出所有分类id name
        $cate=Db("cate")->field("cate_id,cate_name,cate_pid")->select();
        view("",["cate"=>$cate]);
    }

}