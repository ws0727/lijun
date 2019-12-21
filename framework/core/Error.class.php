<?php
namespace framework\core;
class Error{
    public static function errorHandler($err_no,$err_mes,$file,$line){
        $err_mes="<div><b>错误文件:</b>".$file."</div>
        <div><b>行数:</b>".$line."</div><div><b>错误提示:</b>".$err_mes."</div>";
        throw new ErrorException($err_mes,$err_no);
    }
}
