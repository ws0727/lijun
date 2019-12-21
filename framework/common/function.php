<?php

function config($name=null,$value=null)
{
    global $config;
    if ($name === null) {
        return $config;
    }
    if ($value === null) {
        return $config[$name];
    }
    $config[$name] = $value;
}

function view($path="",$data=null){
    $view=new \framework\core\View();
    if(is_array($data)){
        foreach($data as $key=>$val){
            $view->assign($key,$val);
        }
    }
    $view->display($path);
}
function request(){

    return \framework\core\App::get("request");
}

//接值的函数
function input($name,$default=null,$func=null){
    $arr=explode(".",$name);
    if(strtolower($arr[0])==="get"){
        if(empty($arr[1])){
            return request()->get();
        }else{
            return request()->get($arr[1],$default,$func);
        }
    }
    if(strtolower($arr[0])==="post"){
        if(empty($arr[1])){
            return request()->post();
        }else{
            return request()->post($arr[1],$default,$func);
        }
    }
}
function p($data){
    echo "<pre>";
   print_r($data);
    echo "</pre>";
}

//生成地址
function url($path=null,$param=[]){
   return request()->url($path,$param);
}
//
function Db($table=null){
    $db=\framework\core\Model::instance();
    if(!empty($table)){
        $db->table($table);
    }
    return $db;
}
function token(){
    return "<input name='_token' type='hidden' value='".request()->token()."'>";
}
function D($model_name){
    $class_name="\\application\\".MODULE_NAME."\\model\\".ucfirst(strtolower($model_name));
    //使用php的反射机制
    $reflection=new \ReflectionClass($class_name);
    $obj=$reflection->newInstanceWithoutConstructor();
    $obj->setConfig();
    $obj->connect();
    $obj->table($model_name);
    return $obj;
}

function resource($path=null){
    $request=\framework\core\App::get("request");

    $url=$request->server->request_scheme."://".$request->server->server_name.$request->server->script_name;
    if($path===null){
        return dirname($url)."/public/";
    }else{
        $path=ltrim($path."/");
        return dirname($url)."/public/".$path;
    }
}
