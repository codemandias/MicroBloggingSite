<?php
	session_start();

	require_once "../db/db.php";

	//Access Control
	if(!isset($_SESSION['username'])){
		header("Location: ../index.php?noaccess=1");
        die();
	}
	
	// Processing blog article that is submitted
	if (isset($_POST['submit-tweep'])) {
		$tweepTitle = htmlspecialchars(stripslashes(trim($_POST['tweep-title'])));
		$tweepContent = htmlspecialchars(stripslashes(trim($_POST['tweep-content'])));
        $author = $_SESSION['username'];
		$authorID = $_SESSION['userID'];
        $tweepDate = date("Y-m-d");
		$sql = "INSERT INTO `blog-posts` (`blogID`, `author`, `blogDate`, `blogTitle`, `blogContent`, `authorID`) VALUES (NULL, '{$author}', '{$tweepDate}', '{$tweepTitle}', '{$tweepContent}', '{$authorID}')";

		$result = $dbconnection->query($sql);
    
		if ($result) {
			//successful posting!
			header("Location: ../feed.php?post-success=1");
			die();
		}
		else {
			header("Location: ../feed.php?post-unsuccess=1");
			die();
		}
	} else{
		header("Location: ../feed.php?noaccess=1");
        die();
	}

	// Blog article processing concludes
?>