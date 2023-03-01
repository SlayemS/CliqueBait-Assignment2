<?php
namespace app\models;

class User extends \app\core\Model{
	public $user_id;
	public $username;
	public $password_hash;

	public function getByUsername($username){
		$SQL = 'SELECT * FROM User WHERE username = :username';
		$STH = $this->connection->prepare($SQL);

		$STH->execute(['username'=>$username]);
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\User');
		return $STH->fetch();
	}

	public function insert(){
		$SQL = 'INSERT INTO User(username, password_hash) VALUES (:username, :password_hash)';
		$STH = $this->connection->prepare($SQL);

		$STH->execute(['username'=>$this->username,
						'password_hash'=>$this->password_hash]);
		return $this->connection->lastInsertId();// returns the value of the new PK
	}

	public function getProfile(){
		$SQL = "SELECT * FROM Profile WHERE user_id=:user_id";
		$STH = $this->connection->prepare($SQL);

		$STH->execute(['user_id'=>$this->user_id]);
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Profile');
		return $STH->fetch();
	}

	public function updatePassword(){
		$SQL = "UPDATE User SET password_hash=:password_hash WHERE user_id=:user_id";
		$STH = $this->connection->prepare($SQL);
		
		$STH->execute(['password_hash'=>$this->password_hash,
						'user_id'=>$this->user_id]);
	}

}