<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
	<style>
		html {
			box-sizing: border-box;
		}

		*, *:before, *:after {
			box-sizing: inherit;
		}
	</style>
	<title><?= $data ?></title>
</head>
<body style="background: lightgrey;">
	<div class="container" style="background: white;border-bottom: ;">
		<?php
		if(isset($_GET['success'])){
			echo '<div class="alert alert-success">'.$_GET['success'].'</div>';
		}
		if(isset($_GET['error'])){
			echo '<div class="alert alert-danger">'.$_GET['error'].'</div>';
		}
		?>
		
		<nav class="navbar">
			<a href="/Main/index"><img src="/images/cliquebait.png"></a>
			<form action="/Main/search" method="get">
				<input type="search" name="search_term" placeholder="Enter search term">
				<button type="submit" class="btn btn-primary" value="Search">Search</button>
			</form>
			<a href="/User/index">Log In</a>
			<a href="/Publication/create">Create Post</a>
			<a href="/Profile/index">Your Profile</a>
		</nav>