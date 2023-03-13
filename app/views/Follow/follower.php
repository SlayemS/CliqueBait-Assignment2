<div class="list-group" style="margin: 20px 400px;">
		<?php
		foreach ($data as $follower) { ?>
			<a href='/Profile/details/<?=$follower->profile_id?>' class="list-group-item list-group-item-action"><?=$follower->first_name, ' ', $follower->middle_name, ' ', $follower->last_name?></a>
		<?php
		}
		?>
</div>