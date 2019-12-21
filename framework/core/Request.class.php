<?php

namespace framework\core;





class Request
{
    public $server;
    public $post;
    public $get;
    public $param;
    public $token;

    public function __construct()
    {
        //对$server进行复制
        $this->server = new \stdClass();
        foreach ($_SERVER as $key => $val) {
            $key = strtolower($key);
            $this->server->$key = $val;
        }
        //对post赋值
        $this->post = $_POST;
        //对get赋值
        $this->get = $_GET;
        //对param进行赋值
        $this->param = $_REQUEST;

    }

    //判断请求是否为get请求
    public function isGet()
    {
        if ($this->server->request_method === "GET") {
            return true;
        }
        return false;
    }

    //判断请求是否为post请求
    public function isPost()
    {
        if ($this->server->request_method === "POST") {
            return true;
        }
        return false;
    }

    //接get传值
    public function get($name = null, $default = null, $func = null)
    {
        if ($name === null) {
            $default_filter_arr = explode(",", config("default_filter"));
            foreach ($default_filter_arr as $key => $val) {
                $this->get = array_map($val, $this->get);
            }
            return $this->get;
        }
        if (isset($this->get[$name])) {
            if ($func === null) {
                $default_filter_arr = explode(",", config("default_filter"));
                foreach ($default_filter_arr as $key => $val) {
                    $this->get[$name] = $val($this->get[$name]);
                }
                return $this->get[$name];
            } else {
                return call_user_func_array($func, [$this->get[$name]]);
            }
        } else {
            return $default;
        }
    }

    //接post传值
    public function post($name = null, $default = null, $func = null)
    {
        if ($name === null) {
            $default_filter_arr = explode(",", config("default_filter"));
            foreach ($default_filter_arr as $key => $val) {
                $this->post = array_map($val, $this->post);
            }
            return $this->post;
        }
        if (isset($this->post[$name])) {
            if ($func === null) {
                $default_filter_arr = explode(",", config("default_filter"));
                foreach ($default_filter_arr as $key => $val) {
                    $this->post[$name] = $val($this->post[$name]);
                }
                return $this->post[$name];
            } else {
                return call_user_func_array($func, [$this->post[$name]]);
            }
        } else {
            return $default;
        }
    }

    //获取get或者post值
    public function param($name = null, $default = null, $func = null)
    {
        if ($name === null) {
            $default_filter_arr = explode(",", config("default_filter"));
            foreach ($default_filter_arr as $key => $val) {
                $this->param = array_map($val, $this->param);
            }
            return $this->param;
        }
        if (isset($this->param[$name])) {
            if ($func === null) {
                $default_filter_arr = explode(",", config("default_filter"));
                foreach ($default_filter_arr as $key => $val) {
                    $this->param[$name] = $val($this->param[$name]);
                }
                return $this->param[$name];
            } else {
                return call_user_func_array($func, [$this->param[$name]]);
            }
        } else {
            return $default;
        }
    }

    //生成URL地址
    public function url($path = null, $param = [])
    {
        $domain = $this->server->request_scheme . "://" . $this->server->server_name . $this->server->script_name;
        if (is_string($path)) {
            $path = trim($path, "/");
        }
        if (empty($path)) {
            return $domain . "/" . MODULE_NAME . "/" . CONTROLLER_NAME . "/" . ACTION_NAME;
        } else {

            $path_arr = explode("/", $path);
            if (count($path_arr) === 1) {
                $url = $domain . "/" . MODULE_NAME . "/" . CONTROLLER_NAME . "/" . $path_arr[0];
            }
            if (count($path_arr) == 2) {
                $url = $domain . "/" . MODULE_NAME . "/" . $path_arr[0] . "/" . $path_arr[1];
            }
            if (count($path_arr) == 3) {
                $url = $domain . "/" . $path_arr[0] . "/" . $path_arr[1] . "/" . $path_arr[2];
            }
        }
        if (empty($path)) {
            return strtolower($url);
        } else {
            $param_str = "";
            foreach ($param as $key => $val) {
                $param_str .= "/" . $key . "/" . $val;
            }
            return strtolower($url . $param_str);
        }
    }

    //生成token
    public function token(){
        $this->token = md5(uniqid());
        Session::add("_token", $this->token);
        return $this->token;
    }

    public function validate_csrf(){
        if (config("csrf_validate")){
         if(request()->isPost()){
             $session_token=Session::get("_token");
             $input_token=request()->post("_token",null);
             Session::delete("_token");
             if($session_token && $input_token){
                 if($session_token!==$input_token){
                     throw new ErrorException("csrf验证不通过");
                 }
             }else{
                 throw new ErrorException("请验证csrf令牌");
             }
           }
        }

    }
}





