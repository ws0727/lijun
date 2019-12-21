<?php
namespace framework\core;
  class Validate{
  	public static function required($data){
  		if(empty($data)){
  			return false;
  		}else{
  			return true;
  		}
  	 }                     
  	 public static function regex($reg,$data){
  	 	if(preg_match($reg,$data)){
  	 		return true;
  	 	}else{
  	 		return false;
  	 	}
  	 }
  	 public static function comfirmPassword($pwd,$repwd){
  	 	return $pwd==$repwd;
  	 }
  }
  
?>