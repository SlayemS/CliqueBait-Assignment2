<?php
namespace app\models;

class Follow extends \app\core\Model {
	public $follower_id;
	public $followed_id;

	public function insert() {
		$SQL = 'INSERT INTO Follow(follower_id, followed_id) VALUES (:follower_id, :followed_id)';
		$STH = $this->connection->prepare($SQL);

		$STH->execute(['followed_id'=>$this->followed_id,
						'follower_id'=>$this->follower_id]);
	}
	
}