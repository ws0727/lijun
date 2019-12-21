<?php
namespace application\home\model;
use framework\core\Model;

class Cate extends Model{
    public function getBreaNav($cates,$cate){
        $arr = [];
        foreach ($cates as $key => $value) {
            //如果cate里的cate_pid==
            if ($value["cate_id"]==$cate["cate_pid"]) {
                $arr[] = $value;
                $arr = array_merge($arr, $this->getBreaNav($cates, $value));
            }
        }
        return $arr;
    }
}