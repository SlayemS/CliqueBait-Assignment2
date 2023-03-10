<?php
namespace app\filters;

//defining the Login attribute
#[\Attribute]
class Login implements \app\core\AccessFilter{
	public function execute(){
		if(!isset($_SESSION['user_id'])){
			header('location:/User/index?error=You must login to use that feature.');
			return true;
		}
		return false;
	}
}