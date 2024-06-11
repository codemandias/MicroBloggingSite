<?php

	require_once "includes/header.php";
	require_once "db/db.php";
	
	//Access Control
	if(isset($_SESSION['username'])){
		header("Location: feed.php");
        die();
	}

	$_SESSION['token'] = sha1(session_id());
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

		<div class="py-5 text-center container">
			<div class="row">
				<div class="col-lg-6 col-md-8 mx-auto">
				<form class="form-signin" method="post" action="includes/authenticate.php">
					<!-- Bootstrap Login form used from example on getbootstrap.com,
						available here: https://getbootstrap.com/docs/4.0/examples/sign-in/
					-->
					<h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
					<input type="text" name="username" id="input-uname" class="form-control" placeholder="Username" required autofocus>
					<br>
					<input type="password" name="password" id="input-password" class="form-control" placeholder="Password" required>
					<br>
					<input type="submit" name="login" class="btn btn-lg btn-primary btn-block" value="Sign in">
					<input name="token" type="hidden" value="<?php echo $_SESSION['token']; ?>">
				</form>
				</div>
			</div>
		</div>



		</main>

<?php
	require_once "includes/footer.php";
?>