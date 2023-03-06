<?php
namespace app\controllers;

class Follow extends \app\core\Controller{
	#[\app\filters\Login]
	#[\app\filters\Profile]
	public function index(){
		$publication = new \app\models\Follow();
		$publications = $publication->getPublications();
		$this->view('Follow/index', $publications);
	}

	#[\app\filters\Login]
	#[\app\filters\Profile]
	public function search(){
		$publication = new \app\models\Follow();
		$publications = $publication->search($_GET['search_term']);
		$this->view('Follow/index', $publications);
	}
}