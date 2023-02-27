<?php $this->view('shared/header','Main page'); ?>
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
	

	<h1 style="text-align: center;">Publications</h1>
	<!-- Show publication list -->
<?php $this->view('shared/footer'); ?>