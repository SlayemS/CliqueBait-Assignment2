<?php
namespace app\filters;

// Defining Profile attribute
#[\Attribute]
class Profile implements \app\core\AccessFilter{
	public function execute(){
		if(!isset($_SESSION['profile_id'])){
			header('location:/Profile/create?message=Create your profile.');
			return true;
		}
		return false;
	}
}