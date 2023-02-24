<?php
namespace app\controllers;

class Profile extends \app\core\Controller{
	public function index(){
		//view the profile
		$profile = new \app\models\ProfileInformation();
		$profile = $profile->getByUserId($_SESSION['user_id']);
		if($profile)
			$this->view('Profile/index',$profile);
		else
			header('location:/Profile/create');
	}

	public function create(){
		if(isset($_POST['action'])){
			$profile = new \app\models\ProfileInformation();

			$profile->user_id = $_SESSION['user_id'];
			$profile->first_name =  $_POST['first_name'];
			$profile->last_name =  $_POST['last_name'];
			$profile->middle_name =  $_POST['middle_name'];

			$success = $profile->insert();
			if($success)
				header('location:/Profile/index?success=Profile created.');
			else
				header('location:/Profile/index?error=Something went wrong. You can only have one profile.');
		}else{
			$this->view('Profile/create');
		}
	}

	public function edit(){
		$profile = new \app\models\ProfileInformation();
		$profile = $profile->getByUserId($_SESSION['user_id']);

		if(isset($_POST['action'])){

			$profile->first_name =  $_POST['first_name'];
			$profile->last_name =  $_POST['last_name'];
			$profile->middle_name =  $_POST['middle_name'];

			$success = $profile->update();
			if($success)
				header('location:/Profile/index?success=Profile modified.');
			else
				header('location:/Profile/index?error=Something went wrong.');
		}else{
			$this->view('Profile/edit',$profile);
		}
	}

}