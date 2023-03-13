<html>
<head>
	<title><?= $data ?></title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>

<body style="background-color: #c7dbe6;">
	<div class='container'>
		<nav class="navbar navbar-expand-lg" style="background-color: #c7dbe6;">
		    <div class="container-fluid">
		      <a href='/Main/index'><img src="/images/cliquebait.png" style="max-width: 200px;" /></a>

		      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
		        <span class="navbar-toggler-icon"></span>
		      </button>

		      <div class="collapse navbar-collapse" id="navbarColor03">
		        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
		        	<li>
				      	<?php if (!isset($_SESSION['user_id'])) {?>
				      		<a class="nav-link" href="/User/index"><i style="font-size: 2rem;" class='bi-door-closed' title="Log in"></i></a>
				      	<?php } else { ?>
				      		<a class="nav-link" href="/User/logout"><i style="font-size: 2rem;" class='bi-door-open' title='Log out'></i></a>
				      	<?php }
				      	?>
		      		</li>

		          <li class="nav-item">
		            <a class="nav-link" href='/Publication/create'><i style="font-size: 2rem;" class='bi-plus-square' title='New publication'></i></a>
		          </li>
		          <li class="nav-item">
		            <a class="nav-link" href='/Profile/index'><i style="font-size: 2rem;" class='bi-file-earmark-person' title='My Profile'></i></a>
		          </li>
		          <li class="nav-item">
		            <a class="nav-link" href='/Follow/index'><i style="font-size: 2rem;" class='bi-people-fill' title='Following'></i></a>
		          </li>
		        </ul>

		        <?php
		        $url = $_SERVER['REQUEST_URI'];
		        $regEx = "/^\/Follow\/(index||search).*$/";
		        if(isset($_SESSION['profile_id']) && preg_match($regEx, $url) == 1){ ?>
		        	<form class="d-flex" action="/Follow/search" method="get" role="search">
			          <input class="form-control me-2" type="search" name='search_term' placeholder="Search Following" aria-label="Search">
			          <button class="btn btn-outline-primary" type="submit" value="search">
			          	<i class="bi-search"></i>
			          </button>
			        </form>
		        <?php } else{ ?>
		        	<form class="d-flex" action="/Main/search" method="get" role="search">
			          <input class="form-control me-2" type="search" name='search_term' placeholder="Search" aria-label="Search">
			          <button class="btn btn-outline-primary" type="submit" value="search">
			          	<i class="bi-search"></i>
			          </button>
			        </form>
		        <?php } ?>
		      </div>
		    </div>
		</nav>
		<hr>