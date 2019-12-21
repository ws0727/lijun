<?php
    namespace application\home\controller;
    use framework\core\Controller;
    use framework\core\Session;


    class IndexController extends Controller{
//展示页面
        public function index(){
//            $index_file="index.html";
            //如果$index.html文件要是不存在 && 大于300就自动重新从数据库里取
//          if(!file_exists($index_file)&&time()-filemtime($index_file)>300){
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

            //根据ask表里的cate_id查出问题的所属分类
            $session=Session::get("user");
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
            //查出ask表里未解决的最新问题
            $ask1=Db("ask")->where(["ask_status"=>0])->order("ask_time desc")->select();
            //查出ask表里赏金最高的四道题
            $ask2=Db("ask")->order("ask_gold desc")->limit(0,4)->select();


            $ask=Db("ask")->where(["user_id"=>$session["user_id"]])->select();
            $count=Db("ask")->count();
            $cate=Db("cate")->where(["cate_pid"=>0])->select();
           foreach ($cate as $k=>$v){
               $cate[$k]["son"]=Db("cate")->where(["cate_pid"=>$v["cate_id"]])->select();
           }
//                ob_start();
            view("",["ask"=>$ask,"count"=>$count,"cate"=>$cate,"user"=>$user,"userinfo1"=>$userinfo1,"userinfo2"=>$userinfo2,"ask1"=>$ask1,"ask2"=>$ask2]);
//              file_put_contents($index_file,ob_get_contents());
//        }else{
//              require_once("index.html");
//          }
      }






//个人页面
        public function member(){
            //根据ask表里的cate_id查出问题的所属分类
            $session=Session::get("user");
            //根据用户ID查询user表
            $user=Db("user")->where(["user_id"=>$session["user_id"]])->find();
            //根据用户ID查询userinfo表
            $userinfo=Db("userinfo")->where(["user_id"=>$session["user_id"]])->find();
            $user=array_merge($userinfo,$user);
            if(empty($user["user_answer_num"])){
                $user["user_accept_num"]=0;
            }else{
                $user["user_accept_num"]=round($user["user_accept_num"]/$user["user_answer_num"]*100)."%";
            }

            //查询ask表按时间倒序两条
            $ask=Db("ask")->order("ask_time desc")->limit(0,2)->select();
            //查询该用户所有的问题数
            $count1=Db("ask")->where(["user_id"=>$session["user_id"]])->count();
            $count=Db("ask")->count();
            $cate=Db("cate")->where(["cate_pid"=>0])->select();


            view("",["ask"=>$ask,"count"=>$count,"cate"=>$cate,"user"=>$user,"count1"=>$count1]);
        }
    }
?>





<!--$cate=Db("cate")->select();-->
<!--$arr=[];-->
<!--    foreach($cate as $key=>$value){-->
<!--        if($value["cate_pid"]==0){-->
<!--            foreach($cate as $k=>$v){-->
<!--                if($v["cate_pid"]==$value["cate_id"]){-->
<!--                   foreach($cate as $k2=>$v2){-->
<!--                      if($v2["cate_pid"]==$v["cate_id"]){-->
<!--                            $v["res"][]=$v2;-->
<!--                        }-->
<!--                    }-->
<!--                  $value["src"][]=$v;-->
<!--                }-->
<!--            }-->
<!--        $arr[]=$value;-->
<!--    }-->
<!--}-->






