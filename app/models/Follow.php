<?php
namespace app\models;

class Follow extends \app\core\Model {
	public $follower_id;
	public $followed_id;

	public function insert() {
		$SQL = 'INSERT INTO follow(follower_id, followed_id) VALUES (:follower_id, :followed_id)';
		$STH = $this->connection->prepare($SQL);
		$STH->execute(['followed_id'=>$this->followed_id,
						'follower_id'=>$this->follower_id]);
	}
	
	public function delete() {
		$SQL = 'DELETE FROM follow WHERE follower_id=:follower_id';
		$STH = $this->connection->prepare($SQL);
		$STH->execute(['follower_id'=>$this->follower_id]);
	}

	public function getPublications() {
		$SQL = 'SELECT publication.* FROM publication, follow WHERE follow.followed_id=:publication.profile_id';
		$STH = $this->connection->prepare($SQL);
		$STH->execute(['follow.followed_id'=>$this->publication.profile_id]);
	}

	public function search($searchTerm){
		$SQL = "SELECT * FROM publication WHERE caption LIKE :searchTerm ORDER BY `timestamp` DESC";
		$STH = $this->connection->prepare($SQL);
		$STH->execute(['searchTerm'=>"%$searchTerm%"]);
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Publication');
		return $STH->fetchAll();
	}
}