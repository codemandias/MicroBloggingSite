<!doctype html>
<html lang="en">
  	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Jedi Tweeps</title>
	
		<!-- Bootstrap core CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">	

		<!-- Custom CSS -->
		<link rel="stylesheet" href="css/style.css">
  	</head>
  	<body>	
		<header id="pg-header">
			<nav class="navbar navbar-expand navbar-dark bg-dark" aria-label="Second navbar example">
				<div class="container-fluid">
					<a class="navbar-brand" href="<?php if(!isset($_SESSION['username'])){echo "index.php";} else {echo "feed.php";}?>">JT - JediTweeps</a>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>

					<div class="collapse navbar-collapse" id="navbarsExample02">
						<ul class="navbar-nav me-auto">
						<?php
							session_start();
							if (isset($_SESSION['username'])) {// access control
								echo "<li class='nav-item active'>
								<a class='nav-link' aria-current='page' href='feed.php'>Home</a>
								</li>
								<li class='nav-item active'>
								<a class='nav-link' aria-current='page' href='post-blog.php'>Post A Tweep</a>
								</li>
								<li class='nav-item active'>
								<a class='nav-link' aria-current='page' href='followers.php'>Followers</a>
								</li>";
								
								if($_SESSION['access'] == "admin"){
									echo "<li class='nav-item active'>
										<a class='nav-link' aria-current='page' href='profile.php'>Profile</a>
										</li>";
									echo "<li class='nav-item active'>
										<a class='nav-link' aria-current='page' href='admin.php'>Admin</a>
										</li>";
								}

								echo "<li class='nav-item active'>
									<a class='nav-link' aria-current='page' href='includes/logout.php'>Logout</a>
								</li>";
							}
						?>
						</ul>
					</div>
				</div>
			</nav>
		</header>
