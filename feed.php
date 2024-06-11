<?php

	require_once "includes/header.php";
	require_once "db/db.php";

	//Access Control
	if(!isset($_SESSION['username'])){
		header("Location: ./index.php?noaccess=1");
        die();
	}
?>

		<main id="pg-main-content">
			<div class="py-5 text-center container">
				<div class="row">
					<div class="col-lg-6 col-md-8 mx-auto">
						<h1 class="fw-light">JediTweeps</h1>
						<p class="lead text-muted">Tweep your thoughts away!</p>
						<p class="lead text-muted">and Siths, be on your away!</p>
					</div>
				</div>
			</div>
			
		<div class="text-center">
			<?php 
				if(isset($_GET['noaccess'])){
					echo "<p class='lead text-danger'> You do not have access to that place! </p>";
				}
			?>
		</div>

			<section class="space-above-below container">
				<form class="col-lg-6 col-md-8 mx-auto" method="get" action=""> 
						<!-- Postback and perform search here in this file -->
						<input class="form-control" type="text" placeholder="Search by author username or name" aria-label="Search" name="search-keywords">
				</form>

				<section class="space-above-below">
					<?php
						//Displays blogs using the user's search query
						require "includes/display-blogs.php";
					?>
				</section>
			</section>

		</main> 

<?php
	require_once "includes/footer.php";
?>