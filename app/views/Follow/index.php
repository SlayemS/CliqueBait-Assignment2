<?php $this->view('shared/header', 'CliqueBait'); ?>

<h1 style="text-align: center;">Following Feed</h1>
<!-- Show publication list -->
<?php
foreach ($data as $publication) {
	$this->view('Publication/partial', $publication);
}
?>

<?php $this->view('shared/footer'); ?>