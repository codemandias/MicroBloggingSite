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
			
			<div class="container" id="tweep-container">
				<section class="space-above-below">
					<form method="post" action="includes/process-tweep.php">
						<div class="form-row">
							<div class="form-group">
								<label for="blog-title">Tweep Title</label>
								<input type="text" class="form-control" id="tweep-title" name="tweep-title" placeholder="Enter tweep title">
							</div>
                            <br>
						</div>
						<div class="form-group">
							<label for="input-blog">Tweep</label>
							<textarea class="form-control" maxlength = "240" id="input-tweep" name="tweep-content" placeholder="Enter tweep" rows= "5"cols="50"></textarea>
						</div>
                        <br>
						<input type="submit" name="submit-tweep" class="btn btn-primary" value="Tweep It">
					</form>
				</section>
			</div>

		</main> 

<?php
	require_once "includes/footer.php";
?>