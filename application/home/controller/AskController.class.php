<?php
namespace application\home\controller;
use framework\core\Controller;
use framework\core\ErrorException;
use framework\core\Session;

class AskController extends Controller{
    public function ask(){
        if($this->request->isGet()){
            $ask=Db("ask")->select();
            $count=Db("ask")->count();
            $cate=Db("cate")->where(["cate_pid"=>0])->select();
            //取cate表里所有主分类
            $topCate=Db("cate")->where(["cate_pid"=>0])->select();
            $session=Session::get("user");
            if($session){//如果有user就查询如果没有就不走
            //取用户的金币
              $user=Db("userinfo")->field(["user_gold"])->where(["user_id"=>$session["user_id"]])->find();
            }else{
               $user=false;
            }
            view("",["topCate"=>$topCate,"user"=>$user,"ask"=>$ask,"count"=>$count,"cate"=>$cate]);
        }

        if($this->request->isPost()){
            $cate_id=$this->request->post("cate_id");
            $ask_gold=$this->request->post("ask_gold");
            $ask_content=$this->request->post("ask_content");
            $session=Session::get("user");


            //添加ask表
            $ask=Db("ask")->add(["ask_content"=>$ask_content,"ask_time"=>time(),"cate_id"=>$cate_id,"user_id"=>$session["user_id"],"ask_gold"=>$ask_gold]);
            if($ask){
              //根据填写的金币数增加跟减少
              $res1=Db("userinfo")->where(["user_id"=>$session["user_id"]])->setDec("user_gold",$ask_gold);
               //根据提交的问题添加库中的提问数
                $res2=Db("userinfo")->where(["user_id"=>$session["user_id"]])->setInc("user_ask_num",1);
               //每提交一条问题就增加5点经验
              $res3=Db("userinfo")->where(["user_id"=>$session["user_id"]])->setInc("user_exp",5);
             if($res1&&$res2&&$res3){
                 $this->success("提交成功",url("index/index"));
              }else{
                 $this->error("提交失败");
              }
            }else{
              throw new ErrorException("添加失败");
            }
        }
    }

    public function getCate(){
        config("debug",false);
     $cate_id=request()->post("cate_id",0);
     $cate=Db("cate")->where(["cate_pid"=>$cate_id])->select();
       if($cate){
           echo json_encode(["status"=>1,"msg"=>"OK","content"=>$cate]);
       }else{
           echo json_encode(["status"=>0,"msg"=>"没有数据"]);
       }
    }





//回答页面
    public function show(){
        //根据ask表里的cate_id查出问题的所属分类
        $session=Session::get("user");
        //接传过来的ask_id,如果不存在就非法请求
        $ask_id=request()->get("ask_id");
        if(!$ask_id){ throw new ErrorException("非法请求"); }


        //四表联查，查出user_id,cate_id,ask_id,userinfo有关这个问题的所有内容
        $ask1=Db("ask")->join("left join user on ask.user_id=user.user_id join cate on ask.cate_id=cate.cate_id join userinfo on ask.user_id=userinfo.user_id ")->where(["ask_id"=>$ask_id])->find();
        //查出回答问题的总人数
        $count1=Db("answer")->where(["ask_id"=>$ask_id])->count();
        //查出所有回答
        $answer=Db("answer")->join(" join user on answer.user_id=user.user_id")->where(["ask_id"=>$ask_id])->order("answer_time desc")->limit(0,5)->select();
        $answer1=Db("answer")->join(" join user on answer.user_id=user.user_id")->where(["ask_id"=>$ask_id])->find();
        //面包屑导航
        $cate_id=$ask1["cate_id"];   //取得cate_id
        $cates=Db("cate")->select();
        $cate=Db("cate")->where(["cate_id"=>$cate_id])->find();
        $breadNav=D("cate")->getBreaNav($cates,$cate);
        $breadNav=array_reverse($breadNav);   //反转顺序
        array_push($breadNav,$cate);


        //查询这个用户下的所有问题
        $ask=Db("ask")->where(["user_id"=>$session["user_id"]])->select();
        $count=Db("ask")->count();
        //根据用户ID查询user表
        $user=Db("user")->where(["user_id"=>$session["user_id"]])->find();
        //根据用户ID查询userinfo表
        $userinfo=Db("userinfo")->where(["user_id"=>$session["user_id"]])->find();
        //将两个表和为一个一维数组
        $user=array_merge($userinfo,$user);
        //如果采纳几率不存在就为0，如果存在就转换成百分比
        if(empty($user["user_answer_num"])){
            $user["user_accept_num"]=0;
        }else{
            $user["user_accept_num"]=round($user["user_accept_num"]/$user["user_answer_num"]*100)."%";
        }
        //查询user，userinfo表展示所有，用于没有登录情况下的展示后盾问答之星
        $userinfo1=Db("userinfo")->join("left join user on userinfo.user_id=user.user_id")->order("user_answer_num desc")->limit(0,1)->find();
        //如果采纳几率不存在就为0，如果存在就转换成百分比
        if(empty($userinfo1["user_answer_num"])){
            $userinfo1["user_accept_num"]=0;
        }else{
            $userinfo1["user_accept_num"]=round($userinfo1["user_accept_num"]/$userinfo1["user_answer_num"]*100)."%";
        }
        //查询user，userinfo表展示所有，用于没有登录情况下的展示后盾问答光荣榜
        $userinfo2=Db("userinfo")->join("left join user on userinfo.user_id=user.user_id")->order("user_answer_num desc")->limit(0,3)->select();

        view("",["ask"=>$ask,"ask1"=>$ask1,"count"=>$count,"user"=>$user,"userinfo1"=>$userinfo1,"userinfo2"=>$userinfo2,"count1"=>$count1,"answer"=>$answer,"breadNav"=>$breadNav,"answer1"=>$answer1]);
    }



//处理提交回答的ajax
    public function add(){
        config("debug",false);
        //接值
        if(request()->isPost()){
            //取user_id
            $user=Session::get("user");
            $content=request()->post("content","");
            $ask_id=request()->post("ask_id",0);

            //查询登录用户的信息
            $us=Db("user")->where(["user_id"=>$user['user_id']])->find();
            if($ask_id==0){
                throw new ErrorException("非法请求");
            }
            //添加问题到数据answer表
            $data=[
                "ask_id"=>$ask_id,
                "user_id"=>$us['user_id'],
                "answer_content"=>$content,
                "answer_time"=>time()
            ];
            $a=Db("answer")->add($data);
            //修改ask表中的answer_num字段加一
            $b=Db("ask")->where(["ask_id"=>$ask_id])->setInc("ask_answer_num",1);
            //修改uaerinfo表经验值加和answer_num要加
            $c=Db("userinfo")->where(["user_id"=>$us['user_id']])->setInc("user_exp",config("register_exp"));
            $d=Db("userinfo")->where(["user_id"=>$us['user_id']])->setInc("user_answer_num",1);
            if($a && $b && $c && $d){
                echo json_encode(["status"=>1,"msg"=>"ok"]);
            }else{
                echo json_encode(["status"=>0,"msg"=>"没有查到相关数据"]);
            }
        }
    }



//采纳
    public function accept(){
        config("debug",false);
        //接值
        if(request()->isPost()){
            $answer_id=request()->post("answer_id",0);
            if($answer_id==0){
                throw new ErrorException("没有查到id");
            }
        }
        //根据$answer_id查询出user_id和ask_id
        $ask=Db("answer")->where(["answer_id"=>$answer_id])->find();
        //1修改answer表中的状态值为1
        $data=[
            "answer_status"=>1
        ];
        //修改answer表
        $a=Db("answer")->where(["answer_id"=>$answer_id])->update($data);
        //给ask表中的gold加金币
        $b=Db("userinfo")->where(["user_id"=>$ask['user_id']])->setInc("user_gold",config("register_gold"));
        //修改answer_nam加一
        $c=Db("ask")->where(["ask_id"=>$ask['ask_id']])->setInc("ask_answer_num",1);
        if($a && $b && $c){
            echo json_encode(["status"=>1,"msg"=>"ok"]);
        }else{
            echo json_encode(["status"=>0,"msg"=>"采纳问题失败"]);
        }
    }



 //分页
//    public function page(){
//        config("debug",true);
//        $where="1";
//        $p=request()->get("p");
//        $start=($p-1)*1;
//        $ask=Db("ask")->where($where)->order("ask_time desc")->limit(0,4)->select();
//        p($ask);
//    }

 }



