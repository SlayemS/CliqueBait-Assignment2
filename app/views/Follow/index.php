<?php $this->view('shared/header', 'CliqueBait'); ?>

<h1 style="text-align: center;">Publications by People You Follow</h1>
<!-- Show publication list -->
<!-- <?php
$publications = $data->getPublications();
foreach ($publications as $publication) {
	$this->view('Publication/partial', $publication);
}
?> -->

<?php
$publications = $this->viewFollowedPublications($data->profile_id);
foreach ($publications as $publication) {
	$this->view('Publication/partial', $publication);
}
?>

<?php $this->view('shared/footer'); ?>