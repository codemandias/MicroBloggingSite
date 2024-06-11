<?php
	require_once "includes/header.php";
	require_once "db/db.php";
	
	if(isset($_POST["ad-register"])){
		$fname = $_POST["ad-fname"];
		$lname = $_POST["ad-lname"];
		$uname = $_POST["ad-uname"];
		$pswd = password_hash($_POST["ad-pswd"], PASSWORD_BCRYPT);
		$access = $_POST["ad-access"];
		unset($_POST["ad-register"]);
		$result = $dbconnection->query("SELECT * FROM `user-credentials` WHERE `username` = '$uname'");
		if($result->num_rows > 0){
			header("Location: admin.php?registered=taken");
			die();
		}
		if($dbconnection->query("INSERT INTO `user-credentials` (`username`, `password`, `securityAccess`, `firstName`, `lastName`) VALUES('$uname', '$pswd', '$access', '$fname', '$lname');")){
			header("Location: admin.php?registered=success");
			die();
		}
		else{
			header("Location: admin.php?registered=fail");
			die();
		}
	}
?>

		<main id="pg-main-content">
            <div class="py-5 text-center container">
                <div class="row">
                    <div class="col-lg-6 col-md-8 mx-auto" style="width: 100%">
                        <h1 class="fw-light">JediTweeps: Administrative Interface</h1>
                        <p class="lead text-muted">Tweep your thoughts away!</p>
                        <p class="lead text-muted">and Siths, be on your away!</p>
                    </div>
                </div>
            </div>

		<div class="text-center">
			<?php 
				if(isset($_GET['registered'])){
					if($_GET['registered'] == "taken"){
						echo "<p class='lead text-danger'> Username has been taken! </p>";
					}
					else if($_GET['registered'] == "success"){
						echo "<p class='lead text-success'> Account successfully created! </p>";
					}
					else if($_GET['registered'] == "fail"){
						echo "<p class='lead text-danger'> Account not created! </p>";
					}
				}
			?>
		</div>

		<div class="py-5 text-center container">
			<div class="row">
				<div class="col-lg-6 col-md-8 mx-auto">
				<form class="form-signin" method="post" action="admin.php">
					<!-- Bootstrap Login form used from example on getbootstrap.com,
						available here: https://getbootstrap.com/docs/4.0/examples/sign-in/
					-->
					<h1 class="h3 mb-3 font-weight-normal">Create new user account</h1>
					<input type="text" name="ad-fname" id="ad-fname-id" class="form-control" placeholder="First Name" required autofocus>
					<br>
					<input type="text" name="ad-lname" id="ad-lname-id" class="form-control" placeholder="Last Name" required>
					<br>
					<input type="text" name="ad-uname" id="ad-uname-id" class="form-control" placeholder="Username" required>
					<br>
					<input type="password" name="ad-pswd" id="ad-pswd-id" class="form-control" placeholder="Password" required>
					<br>
					<div style="margin-bottom: 20px; display: flex; flex-direction: row;">
						<p class="fw-light" style="width: 20%;" align="left"><b>Access type</b></p>
						<div style="width: 40%;">
							<input type="radio" name="ad-access" id="ad-author-id" value="author" checked="">
							<label for="ad-author-id" class="fw-light">Author</label>
						</div>
						<div style="width: 40%;">
							<input type="radio" name="ad-access" id="ad-admin-id" value="admin">
							<label for="ad-admin-id" class="fw-light">Admin</label>
						</div>
					</div>
					<input type="submit" name="ad-register" class="btn btn-lg btn-primary btn-block" value="Register">
					
				</form>
				</div>
			</div>
		</div>



		</main>

<?php
	require_once "includes/footer.php";
?>