<div class='jumbotron rounded' id='publication<?=$data->publication_id?>' style='text-align: center; margin: 15px 230px; border: 2px solid #160f29; background-color: white;'>

	<?php $profile=$data->getProfile(); ?>
	<p style="margin: 5px 0 8px 30px; text-align: left;">
		<a class="text-decoration-none" href='/Profile/details/<?=$profile->profile_id ?>' style='color: black; font-weight: bold;'><?= htmlspecialchars($profile) ?>
		</a>
	</p>

	<a href="/Publication/details/<?=$data->publication_id?>">
		<img class="rounded" src="/images/<?= $data->picture ?>" width='600px'>
	</a>

	<p style="margin: 5px 0 0 35px; text-align: left;">
		<strong>Description: </strong>
		<?=htmlspecialchars($data->caption) ?>
	</p>

	<p style="bottom: ; text-align: right; margin: 5px 35px 8px 0;">
		Posted on <?= $data->timestamp?><?php
		if(isset($_SESSION['user_id']) && $_SESSION['user_id'] == $data->profile_id){
			echo "<a href='/Publication/delete/$data->publication_id'><i class='bi-trash'></i></a>";
			echo "<a href='/Publication/edit/$data->publication_id'><i class='bi-pen'></i></a>";
		}
	?>
	</p>
</div>