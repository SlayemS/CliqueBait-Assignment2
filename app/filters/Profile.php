<?php
namespace app\filters;

#[\Attribute]
class Profile extends \app\core\AccessFilter{
	public function execute(){
		if(!isset($_SESSION['profile_id'])){
			header('location:/Profile/create?message=Create your profile.');
			return true;
		}
		return false;
	}
}