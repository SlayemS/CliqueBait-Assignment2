<?php
namespace app\models;

class Profile extends \app\core\Model{
	public function __toString(){
		return "$this->first_name $this->middle_name $this->last_name";
	}

	public function getAll(){
		$SQL = "SELECT * FROM profile";
		$STH = $this->connection->prepare($SQL);
		$STH->execute();
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Profile');
		return $STH->fetchAll();
	}

	public function get($user_id){
		$SQL = "SELECT * FROM profile WHERE user_id=:user_id";
		$STH = $this->connection->prepare($SQL);
		$STH->execute(['user_id'=>$user_id]);
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Profile');
		return $STH->fetch();
	}

	public function getPublications(){
		$SQL = "SELECT * FROM publication WHERE profile_id=:profile_id ORDER BY `timestamp` DESC";
		$STH = $this->connection->prepare($SQL);
		$STH->execute(['profile_id'=>$this->profile_id]);
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Publication');
		return $STH->fetchAll();
	}

	public function insert(){
		$SQL = "INSERT INTO profile(first_name, middle_name, last_name, user_id) VALUES (:first_name, :middle_name, :last_name, :user_id)";
		$STH = $this->connection->prepare($SQL);
		$STH->execute(['first_name'=>$this->first_name,
						'middle_name'=>$this->middle_name,
						'last_name'=>$this->last_name,
						'user_id'=>$this->user_id]);
		return $this->connection->lastInsertId();
	}

	public function update(){
		$SQL = "UPDATE profile SET first_name=:first_name, middle_name=:middle_name, last_name=:last_name WHERE user_id=:user_id";
		$STH = $this->connection->prepare($SQL);
		$STH->execute(['first_name'=>$this->first_name,
						'middle_name'=>$this->middle_name,
						'last_name'=>$this->last_name,
						'user_id'=>$this->user_id]);
	}
}