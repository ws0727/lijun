<?php
namespace framework\core;

class ErrorException extends \Exception{
    public function exceptionHandler($e){

        if(config("debug")){
            //显示错误
           $this->getInfo($e);
        }else{
            //记录日志
           $this->write_log($e);
            exit("<h1>页面错误! 请稍后再试~</h1>");
        }
    }
    public function getInfo($e){
       $str= <<< EOF
    <h3><b style='font-size:40px'>:(</b><div>程序发生错误，如下:<div><h3>
    <p><b>错误提示：</b>{$e->getMessage()}</p>
    <p><b>运行流程：{$e->getTraceAsString()}</b></p>
EOF;
       echo $str;
    }
    public function write_log($e){
        $log_dir=APP_RUNTIME_PATH."log/".date("Y-m-d")."/";
        if(!is_dir($log_dir)){
            mkdir($log_dir,true,0777);
        }
        $log_file=$log_dir."error".date('H').".log";
        $data=strip_tags($e->getMessage())."时间:".date("Y-m-d")."IP:".$_SERVER['REMOTE_ADDR']."\n";
        error_log($data,3,$log_file);
    }
}