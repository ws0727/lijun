<?php

namespace framework\core;
class Route{
    //初始化模块，控制器，方法
    public $path_info;
    public function init()
    {
        $this->path_info=isset($_SERVER['PATH_INFO'])?trim($_SERVER['PATH_INFO'],"/"):"";
        //初始化模块
        $this->initModule();
        //初始化控制器
        $this->initController();
        //初始化方法
        $this->initAction();
        //处理参数
        $this->initParam();
    }
    //初始化模块
    public function initModule(){
        if($this->path_info){
            $path_info=explode("/",$this->path_info);
            if(isset($path_info[0])&&!empty($path_info[0])){
                define("MODULE_NAME",strtolower($path_info[0]));
            }else{
                define("MODULE_NAME",strtolower(config("default_module")));
            }
        }else{
            define("MODULE_NAME",strtolower(config("default_module")));
        }
        define("MODULE_PATH",APP_PATH.MODULE_NAME."/");
        define("VIEW_PATH",MODULE_PATH."/view/");
    }
    //初始化控制器
    public function initController(){
        if($this->path_info){
            $path_info=explode("/",$this->path_info);
            if(isset($path_info[1])&&!empty($path_info[1])){
                define("CONTROLLER_NAME",ucfirst(strtolower($path_info[1])));
            }else{
                define("CONTROLLER_NAME",ucfirst(strtolower(config("default_controller"))));
            }
        }else{
            define("CONTROLLER_NAME",ucfirst(strtolower(config("default_controller"))));
        }
    }
    //初始化方法
    public function initAction(){
        if($this->path_info){
            $path_info=explode("/",$this->path_info);
            if(isset($path_info[2])&&!empty($path_info[2])){
                define("ACTION_NAME",strtolower($path_info[2]));
            }else{
                define("ACTION_NAME",strtolower(config("default_action")));
            }
        }else{
            define("ACTION_NAME",strtolower(config("default_action")));
        }
    }


    //初始化参数
    public function initParam(){

      $path_info=isset(request()->server->path_info)?request()->server->path_info:"";
        $path_info=trim($path_info,"/");
        if(!empty($path_info)) {
             $path_arr=explode("/",$path_info);
          if(count($path_arr)>3){
              array_shift($path_arr);
              array_shift($path_arr);
              array_shift($path_arr);
              foreach($path_arr as $key=>$val){
                  if($key%2==0){
                    request()->get[$val]=isset($path_arr[$key+1])?$path_arr[$key+1]:null;
                }
              }
            }
          }
        }



    public function  dispense(){
        $className="\\application\\".MODULE_NAME."\\controller\\".CONTROLLER_NAME."Controller";
        $obj=new $className();
        $action_name=ACTION_NAME;
        if(method_exists($obj,$action_name)){
            $obj->$action_name();
        }else{
            throw new ErrorException($action_name."方法不存在");
        }
    }

}