<?php $this->view('shared/header', 'CliqueBait'); ?>

<h1>New Publication</h1>
<form action='' method='post' enctype='multipart/form-data'>
	<div class="form-group">
		<label class="col-sm-2 col-form-label">Picture:</label><input class='form-control' type="file" name="picture" id="picture">
		<br/>
		<img id='pic_preview' width='200px'/>
	</div>
	<div class="form-group">
		<label class="col-sm-2 col-form-label">Caption:<input class='form-control' type="text" name="caption" placeholder='Say something about your picture.' /></label>
	</div>
	<input type="submit" name="action" value="Publish" class='btn btn-primary' />
</form>

<a href='/'>Cancel</a>

<script>
	picture.onchange = evt => {
  const [file] = picture.files
  if (file) {
    pic_preview.src = URL.createObjectURL(file)
  }
}
</script>
<?php $this->view('shared/footer'); ?>