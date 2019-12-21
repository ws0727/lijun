<?php
namespace framework\core;

    use think\exception\ErrorException;

    class Model{
        public $host;  //主机名
        public $user;  //用户名
        public $pwd;   //密码
        public $dbname; // 库命
        public $charset; //字符集
        public $link;    //数据库连接
        public $table;   //要操作的表
        public $where;
        public $field="*";
        public $order="";
        public $limit="";
        public $join="";

        private static $obj=null;

        private function __construct(){
            $this->setConfig();
            $this->connect();
        }
        public static function instance(){
            if(is_null(self::$obj)){
               self::$obj=new self();
            }
            return self::$obj;
        }
        private function __clone(){

        }
        //设置属性
        public function setConfig(){
            $this->host=config("hostname");
            $this->user=config("username");
            $this->pwd=config("password");
            $this->dbname=config("database");
            $this->charset=config("hostname");
        }

        //连接数据库
        public function connect(){
            $this->link = mysqli_connect($this->host.":".config("hostport"),$this->user,$this->pwd);
            if(!$this->link) throw new ErrorException("数据库连接失败");
            if(!mysqli_select_db($this->link,$this->dbname)){
                throw new ErrorException("选择数据库失败");
            }
            mysqli_set_charset($this->link,$this->charset);
        }
        //切换表
        public function table($table){
            $this->table=$table;
            return $this;
        }
        //添加单条数据
        public function add($data){
            if(!is_array($data)||empty($data)){
                throw new ErrorException("传递的参数不是一个数组");
                return false;
            }
            $fieldArr = array_keys($data);
            $field    = '`'.implode("`,`",$fieldArr)."`";
            $value    = "'".implode("','",$data)."'";
            $sql = "INSERT INTO ".$this->table."(".$field.") VALUES(".$value.")";
            if($this->execute($sql)){
                return mysqli_insert_id($this->link);
            }else{
                return false;
            }
        }
        //添加多条数据
        public function addAll($data){
            if(!is_array($data)||empty($data)){
                throw new ErrorException("传递的参数不是一个数组");
                return false;
            }
            if(!is_array($data[0])){
                throw new ErrorException("传递的参数不是一个二维数组");
                return false;
            }
            $fieldArr = array_keys($data[0]);
            $field    = '`'.implode("`,`",$fieldArr)."`";
            $dataList=[];
            foreach ($data as $key => $val) {
                array_push($dataList,"('".implode("','",$val)."')");
            }
            $sql="INSERT INTO ".$this->table."(".$field.") VALUES ".implode(",",$dataList);
            return $this->execute($sql);
        }
        //删除
        public function delete(){
            $sql="DELETE FROM ".$this->table.$this->where;
            return $this->execute($sql);
        }
        //修改
        public function update($data){
            $dataList=[];
            foreach ($data as $k => $v) {
                array_push($dataList,"`".$k."` = "."'".$v."'");
            }
            $sql="UPDATE ".$this->table." SET ".implode(",",$dataList).$this->where;
            return $this->execute($sql);
        }
        public function select(){
            //处理字段
            $sql="SELECT ".$this->field." FROM ".$this->table.$this->join.$this->where.$this->order.$this->limit;
            return $this->query($sql);
        }
        //查询单条数据
        public function find(){
            //处理字段
            $sql="SELECT ".$this->field." FROM ".$this->table.$this->join.$this->where.$this->order.$this->limit;
            App::get("debug")->sql[]=$sql;
            $this->where="";
            $this->field="*";
            $this->order="";
            $this->limit="";
            $this->join="";
            $res=mysqli_query($this->link,$sql);
            if($res){
                if(!$data=mysqli_fetch_assoc($res)){
                    $data=[];
                }
                return $data;
            }else{
                throw new \framework\core\ErrorException("sql语句错误");

                return false;
            }
        }
        //查询总条数
        public function count(){
            //处理字段
            $sql="SELECT ".$this->field." FROM ".$this->table.$this->join.$this->where.$this->order.$this->limit;
            if($this->execute($sql)){
                return mysqli_affected_rows($this->link);
            }else{
                return false;
            }
        }
        //处理要查的字段
        public function field($field="*"){
            if(is_string($field)){
                $this->field=$field;
            }
            if(is_array($field)){
                $this->field="`".implode("`,`",$field)."`";
            }
            return $this;
        }
        //处理条件
        public function where($w=null,$ge="AND"){
            if(empty($w)){
                $this->where=" WHERE 1";
            }
            if(is_string($w)&& !empty($w)){
                $this->where=" WHERE ".$w;
            }
            if(is_array($w)&&!empty($w)){
                $dataList=[];
                foreach($w as $k=>$v){
                    array_push($dataList,"`".$k."`="."'".$v."'");
                }
                $this->where=" WHERE ".implode(" ".strtoupper($ge)." ",$dataList);
            }
            return $this;
        }
        //join
        public function join($join){
            $this->join.=" ".$join;
            return $this;
        }
        //排序
        public function order($order){
            $this->order=" ORDER By ".$order;
            return $this;
        }
        //limit
        public function limit($offset,$listRows){
            $this->limit=" LIMIT ".$offset.",".$listRows;
            return $this;
        }
        //执行增删改sql语句
        public function execute($sql){
            App::get("debug")->sql[]=$sql;
            $res=mysqli_query($this->link,$sql);
            $this->where="";
            $this->field="*";
            $this->order="";
            $this->limit="";
            $this->join="";
            if($res){
                return true;
            }else{
                throw new \framework\core\ErrorException("sql语句错误");
                return false;
            }
        }
        //执行查询的sql语句
        public function query($sql){
            App::get("debug")->sql[]=$sql;
            $res=mysqli_query($this->link,$sql);
            $this->where="";
            $this->field="*";
            $this->order="";
            $this->limit="";
            $this->join="";
            if($res){
                return mysqli_fetch_all($res,MYSQLI_ASSOC);
            }else{
                throw new \framework\core\ErrorException("sql语句错误");
                return false;
            }
        }

        //析构函数。
        public function __destruct(){
            mysqli_close($this->link);
        }

      //
        public function setInc($field,$number){
            $sql="UPDATE ".$this->table." SET ".$field."=".$field."+".$number.$this->where;
            return $this->execute($sql);
        }
        public function setDec($field,$number){
            $sql="UPDATE ".$this->table." SET ".$field."=".$field."-".$number.$this->where;
            return $this->execute($sql);
        }

    }
?>