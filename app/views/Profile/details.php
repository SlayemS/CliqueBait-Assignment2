<?php $this->view('shared/header', 'CliqueBait'); ?>

<img class="rounded-circle" src="/images/defaultPFP.png" alt="" style="text-align: right; display:block; margin-top: 25px;" width= '140px'>
<h1><?=$data?></h1>

<?php
if(isset($_SESSION['profile_id']) && $_SESSION['profile_id'] == $data->profile_id){
	echo '<a href="/Profile/edit">Edit my profile</a>';
}
?>

<?php
if($this->iFollow($data->profile_id)){
	echo '<a href=',"/Follow/unfollowUser/$data->profile_id",'>Unfollow</a>';
	//echo '<form method="post" action=""><input type="submit" name="action" value="Follow" class="btn btn-primary"/></form>';
}else{
	echo '<a href=',"/Follow/followUser/$data->profile_id",'>Follow</a>';
	//echo '<form method="post" action=""><input type="submit" name="action" value="Unfollow" class="btn btn-primary"/></form>';
}
?>

<h2 style="text-align: center;">Posts</h2>
<?php
$publications = $data->getPublications();
foreach ($publications as $publication) {
	$this->view('Publication/partial', $publication);
}
?>

<?php $this->view('shared/footer'); ?>