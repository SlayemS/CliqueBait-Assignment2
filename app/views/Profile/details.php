<?php $this->view('shared/header', 'CliqueBait'); ?>

<img class="rounded-circle" src="/images/defaultPFP.png" alt="" style="text-align: right; display:block; margin-top: 25px;" width= '140px'>
<h1><?=$data?></h1>

<?php
if(isset($_SESSION['profile_id']) && $_SESSION['profile_id'] == $data->profile_id){
	echo '<a href="/Profile/edit">Edit my profile</a>';
}
?>

<?php
if($this->iFollow($data->profile_id) && isset($_SESSION['profile_id']) && $_SESSION['profile_id'] != $data->profile_id){
	echo "<a href='/Follow/unfollowUser/$data->profile_id' class='btn btn-primary'>Unfollow</a>";
}else if(isset($_SESSION['profile_id']) && $_SESSION['profile_id'] != $data->profile_id){
	echo "<a href='/Follow/followUser/$data->profile_id' class='btn btn-primary'>Follow</a>";
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