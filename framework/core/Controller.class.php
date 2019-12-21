<?php

namespace framework\core;
class Controller{
    public $view;
    public $request;
    public function __construct()
    {
        $this->view=new View();
        $this->request=App::get("request");
    }
    public function assign($name,$value){
        $this->view->assign($name,$value);
    }
    public function fetch($tpl=null){
        $this->view->display($tpl);
    }


    //成功跳转
    public function success($msg,$url,$sce=3){
        echo "<div style='width:98%;margin:20px auto;'><span style='font-weight:bold;font-size:150px;'>(:</span><b style='font-size:60px;'>".$msg."</b></div>";
        echo "<div style='width:98%;margin:20px auto;'><b id='sce'>".$sce."</b>秒跳转</div>";
        echo <<<ETO
                <script>
                    var t=$sce-1;
                    function time(){
                        if(t>0){
                            document.getElementById("sce").innerHTML=t;
                            t--;
                        }else{
                            document.getElementById("sce").innerHTML=0;
                            location.href="$url";
                            clearInterval(a);
                        }
                    }
                    var a=setInterval('time()',1000);
                </script>
ETO;
        exit;
    }


    //失败跳转
    public function error($msg,$sce=3){
        echo "<div style='width:98%;margin:20px auto;'><span style='font-weight:bold;font-size:60px;'>(:</span>".$msg."</div>";
        echo "<div style='width:98%;margin:20px auto;'><b id='sce'>".$sce."</b>返回上一个页面</div>";
        echo <<<ETO
                <script>
                    var t=$sce;
                    function time(){
                        if(t>0){
                            document.getElementById("sce").innerHTML=t;
                            t--;
                        }else{
                            document.getElementById("sce").innerHTML=0;
                            history.back();
                            clearInterval(a);
                        }
                    }
                    setInterval('time()',1000);
                </script>
ETO;
        exit;
    }
    //没有提示直接跳转
    public function redirect($url=null){
        if($url===null){
            echo "<script>history.back();</script>";
            return;
        }
        echo "<script>location.href='".$url."'</script>";
        return;

    }
}