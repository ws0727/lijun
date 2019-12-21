<?php
namespace framework\core;
  class upload{
  	  public $rootPath="upload";   //上传的路径           
  	  public $savePath="";         //上传的保存路径
  	  public $allowType=array("jpg","jpeg","png","gif");//允许上传的类型
  	  public $maxSize=3000000;     //允许上传的大小
  	  public $error;               //判断是否合法
      public function checkUploadFile($file){  
      //没有文件上传
      if(empty($file['name'])){
      $this->error="没有文件上传"	;
      return false;
      }
      //上传文件失败  
      if($file['error']!=0){
      $this->error="上传错误";	
      return false;
      }
      //上传文件类型是否是我们需要的类型   
      $ext =$this->getExt($file['name']);
      if(!in_array($ext,$this->allowType)){
      $this->error="文件类型不正确";
      return false;
      }
      //判断上传文件的大小  
      if($file['size']>$this->maxSize){
      $this->error="上传文件过大";
      return false;
      }
      //判断上传文件是否是一个上传文件
      if(!is_uploaded_file($file['tmp_name'])){
      $this->error="上传文件不是一个临时文件";	
      return false;
      }
      return true;
      }
     //单文件上传
     public function uploadOne($file){
     	if($this->checkUploadFile($file)){
     		 $dir=$this->getuploadDir();
     		 $ext=$this->getExt($file['name']);
     		 $path=$dir.uniqid().".".$ext;
             if(move_uploaded_file($file['tmp_name'],$path)){
             	return str_replace("//","/", $path);
             }else{
             	$this->error="上传文件失败";
             	return false;
             }
     	}else{
          return false;
     	}
     } 

    //处理多文件上传
       public function uploads(){
       if($fileArr=$this->dealuploadsArr()){
        $pathArr=[];
        foreach ($fileArr as $key => $value) {
        	$path=$this->uploadone($value);
        	array_push($pathArr,$path);
        }
        return $pathArr;
      }else{
        return false;
      } 
     }  
    // 获取一个文件后缀名
    public function getExt($filename){
      return pathinfo($filename,PATHINFO_EXTENSION);
    }
    public function getuploadDir(){
    	$dir=trim($this->rootPath,"/")."/".trim($this->savePath,"/")."/".date("Y-m-d")."/";
    	if(!is_dir($dir)){
            mkdir($dir,0777,true);
       }
       return $dir;
    }
    //处理多文件上传的数组
    public function dealuploadsArr(){
    	 $files=array_pop($_FILES);
       if(!empty($files['name'][0])){
        $fileArr=[];
        foreach ($files as $key => $value) {
          foreach ($value as $k => $v) {
            $fileArr[$k][$key]=$v;
           }
        	}
          return $fileArr;
        }else{
          $this->error="请上传文件";
          return false;
        } 
      }
    //获取上传的错误信息
     public function getError(){
     return $this->error;
    } 
 }
?>