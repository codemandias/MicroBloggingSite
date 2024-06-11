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
			<?php
			if(isset($_GET['postID'])){
				$id = (int) $_GET['postID'];
				$sql = "SELECT * FROM `blog-posts` WHERE `blogID` in ($id)";
				$result = $dbconnection->query($sql); 
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $blogID = $row['blogID'];
                        $author = $row['author'];
                        $blogDate = $row['blogDate'];
                        $blogTitle = $row['blogTitle'];
                        $blogContent = $row['blogContent'];
                        echo"<div class='container'>
                        <article class='space-above-below'>
    
                            <h2 class='fw-light'>$blogTitle</h2>
                            <hr>
                            <h5 class='fw-light'>Posted by $author on $blogDate</h5>
                            <p class='text-muted'>$blogContent</p>
    
                        </section>
                        </div>";
                    }
                } else {//If no blogs found
                    echo "<p>Sorry, no blog posts available. You have to follow people to see blog posts.</p>";
                }
			} else{
				header("Location: ./feed.php");
        		die();
			}
			?>
		</main>

<?php
	require_once "includes/footer.php";
?>