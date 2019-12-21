<?php
return [
    'default_module'=>'home', //默认的模块
    'default_controller'=>'Index',//默认的控制器
    'default_action'=>'index',//默认的方法
    'debug'=>true,            //错误处理
    'view_suffix'  => 'html',//模板的后缀
    'default_filter'         => 'htmlspecialchars,addslashes',//默认的全局过滤配置
    //配置
    'auto_start'=>true,    //是否开启session

    // 服务器地址
    'hostname'        => '127.0.0.1',
    // 数据库名
    'database'        => 'wenda',
    // 用户名
    'username'        => 'root',
    // 密码
    'password'        => 'root',
    // 端口
    'hostport'        => '3306',
    // 数据库编码默认采用utf8
    'charset'         => 'utf8',
    // 数据库表前缀
    'prefix'          => '',
    //加密的秘传
    'app_key'         =>'eqewqeq',
    'csrf_validate'   =>false,
    'k780_app_key'=>'45300',
    'k780_app_sign'=>"439deb6ad2b4886dcfa990a83dc0e1ea",
];
?>