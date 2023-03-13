<?php $this->view('shared/header', 'CliqueBait'); ?>

<img class="rounded-circle" src="/images/def_pfp.png" alt="$data's profile" style="text-align: right; display:block; margin-top: 25px;" width= '140px'>
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

<?php
$publications = $data->getPublications();

if ($publications) { ?>
	<h2 style="text-align: center;">Posts</h2>

	<?php foreach ($publications as $publication) {
		$this->view('Publication/partial', $publication);
	}
} else { ?>
	<h2 style="text-align: center;">This user has no posts</h2>
<?php }
?>

<?php $this->view('shared/footer'); ?>