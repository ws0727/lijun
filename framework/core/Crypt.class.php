<?php
namespace framework\core;
	class Crypt{
		public static function md5_encrypt($data,$sult){
			return md5(md5($data).$sult);
		}
		public static  function  encrypt($data){
			$data=json_encode($data);
			return openssl_encrypt($data,"DES-ECB",config("app_key"));
		}
		public static function decrypt($data){
			$data=openssl_decrypt($data,"DES-ECB",config("app_key"));
			return json_decode($data,true);
		}
	}
?>