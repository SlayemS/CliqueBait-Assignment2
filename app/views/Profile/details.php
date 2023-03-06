<?php $this->view('shared/header', 'CliqueBait'); ?>

<h1><?=$data ?></h1>

<?php
if(isset($_SESSION['profile_id']) && $_SESSION['profile_id'] == $data->profile_id){
	echo '<a href="/Profile/edit">Edit my profile</a>';
}
?>

<?php
if(isset($_SESSION['profile_id']) && $_SESSION['profile_id'] != $data->profile_id){
	echo '<form method="post" action=""><input type="submit" name="action" value="Follow" class="btn btn-primary"/></form>';
}else{
	echo '<form method="post" action=""><input type="submit" name="action" value="Unfollow" class="btn btn-primary"/></form>';
}
?>

<h2>Publications by <?=$data ?></h2>
<?php
$publications = $data->getPublications();
foreach ($publications as $publication) {
	$this->view('Publication/partial', $publication);
}
?>

<?php $this->view('shared/footer'); ?>