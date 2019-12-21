<?php

namespace framework\core;
class View{
    public $smarty;
    //构造方法，用来实例化并配置smarty模板
    public function __construct()
    {
        require_once(FRAMEWORK_CORE_PATH."smarty/Autoloader.php");
        App::get("debug")->file[]=FRAMEWORK_CORE_PATH."smarty/Autoloader.php";
        require_once(FRAMEWORK_CORE_PATH."smarty/bootstrap.php");
        App::get("debug")->file[]=FRAMEWORK_CORE_PATH."smarty/bootstrap.php";
        $this->smarty=new \Smarty();
        $this->smarty->left_delimiter="<{";
        $this->smarty->right_delimiter="}>";
        $this->smarty->setTemplateDir(VIEW_PATH);
        $this->smarty->setCompileDir(APP_RUNTIME_PATH.MODULE_NAME."/".CONTROLLER_NAME);
    }
    //在模板中分配变量
    public function assign($name,$value){
        $this->smarty->assign($name,$value);
    }
    //显示模板
    public function display($tpl_path=null){
        $tpl_path=$this->dealViewPath($tpl_path).".".config("view_suffix");
        if(!file_exists(VIEW_PATH.$tpl_path)){
            throw new ErrorException(VIEW_PATH.$tpl_path."模板不存在");
        }
        App::get("debug")->file[]=VIEW_PATH.$tpl_path;
        $this->smarty->display($tpl_path);
    }
    //处理模板的路径
    private function dealViewPath($tpl_path){
        if(is_string($tpl_path)){
            $tpl_path=trim($tpl_path,"/");
        }
        if(empty($tpl_path)){
            $tpl_path=strtolower(CONTROLLER_NAME)."/".ACTION_NAME;
        }else{
            $tplArr=explode("/",$tpl_path);
            if(count($tplArr)===1) {
                $tpl_path = strtolower(CONTROLLER_NAME) . "/" . $tplArr[0];
            }
        }
        return $tpl_path;
    }

}