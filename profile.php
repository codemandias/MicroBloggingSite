<?php
	* Title: Admin Profile
	* Purpose: See profile information and change password
    * Implementor: Aditya Sharma (B00827775)
	* Features Implemented on page: User Story 2
	*/

	require_once "includes/header.php";
	require_once "db/db.php";

	//Access Control
	if(!isset($_SESSION['username'])){
		header("Location: ./index.php?noaccess=1");
        die();
	} else if($_SESSION['access'] != "admin") {
		header("Location: ./feed.php?noaccess=1");
        die();
	}
?>
	<main id='pg-main-content'>
	<div class='py-5 text-center container'>
		<div class='row'>
			<div class='col-lg-6 col-md-8 mx-auto'>
				<h1 class='fw-light'>Jedi Tweeps: Your Profile</h1>
			</div>
		</div>
	</div>

	<div class="text-center">
		<?php 
			if(isset($_GET['password-changed'])){
				echo "<p class='lead text-success'> You have successfully changed your password! </p>";
			} else if(isset($_GET['password-notchanged'])){
				echo "<p class='lead text-danger'>  There was an error in changing your password, please try again! </p>";
			}
		?>
	</div>

	<div class='py-5 text-center container'>
		<div class='row'>
			<div class='col-lg-6 col-md-8 mx-auto'>
				<p class='lead text-muted'>Full Name: <?php echo $_SESSION['fullname']; ?></p>
				<label for='displayName'>Username: </label><input type='text' id='uname' name='unameField' value ='<?php echo $_SESSION['username']; ?>' readonly><br><br>
				<label for='displayPass'>Password: </label><input type='text' id='pass' name='passField' value ='<?php echo $_SESSION['password']; ?>' readonly><br><br>
                <form class='form-signin' method='post' action=''>
                <h5>Change Password</h5>
                <input type='password' name='new-password' id='input-password' class='form-control' placeholder='New Password' required>
                <br>
                <input type='submit' name='change-pass' class='btn btn-lg btn-primary btn-block' value='change password'>
                </form>
            </div>
		</div>
	</div>
	</main>
	<?php
    if(isset($_POST['change-pass'])){
        $newpass = password_hash($_POST['new-password'], PASSWORD_DEFAULT);
        $querySQL = "UPDATE `user-credentials` SET `password` = '$newpass' WHERE `username` = '$_SESSION[username]';";
        $result = $dbconnection->query($querySQL);
		if($result){
			$_SESSION['password'] = $_POST['new-password'];
			header("Location: ./profile.php?password-changed=1");
			die();
		} else {
			header("Location: ./profile.php?password-notChanged=1");
			die();
		}
    }
	$querySQL = "SELECT * FROM `blog-posts` WHERE `author` LIKE '%$_SESSION[username]%'";
	$result = $dbconnection->query($querySQL);
	echo"<div class='container'>
			<section class='space-above-below'>
				<h4 class='fw-light'>Your Blogs.</h4>
				<hr>";
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$blogID = $row['blogID'];
				$author = $row['author'];
				$blogDate = $row['blogDate'];
				$blogTitle = $row['blogTitle'];
				$blogContent = $row['blogContent'];
				echo "<section id='post-$blogID' class='space-above-below'>
						<h4 class='fw-light'>$blogTitle</h4>
						<h6 class='fw-light'>Posted by $author on $blogDate</h6>
						<p class='text-muted'>$blogContent</p>
						<a href='post.php?postID=$blogID' role='button' class='btn btn-primary'>More details &raquo;</a>
					</section><br>";
			}
		} else {
			echo "You have not posted any blogs";
		}
	echo "</section>
			<div>";
?>

<?php
	require_once "includes/footer.php";
?>