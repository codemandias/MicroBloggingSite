<?php
    // Title: Website homepage
	// Purpose: Post tweep (if logged in), Search for tweep  (by username or fullname),  View Recent Tweeps posted on the website
    // Implementor: Aditya Sharma (B00827775)
	// Features Implemented on page: User Story 5

    //Access Control
	if(!isset($_SESSION['username'])){
		header("Location: ../index.php?noaccess=1");
        die();
	}

    echo "<h2 class='fw-light'>Search Results</h2>";
    echo "<hr>";
     
    if(isset($_GET['search-keywords'])){
        $search= $_GET["search-keywords"];
        $querySQL = "SELECT * FROM `blog-posts` WHERE `author` LIKE '%$search%' ORDER BY `blogDate` DESC";
        $result = $dbconnection->query($querySQL);
        //If no results, search by author's fullname
        if ($result->num_rows == 0) {
            $querySQL = "SELECT `userID` FROM `user-credentials` WHERE (CONCAT(`firstName`, ' ', `lastName`) LIKE '%$search%')";
            $querySQL = "SELECT * FROM `blog-posts` WHERE `authorID` IN ($querySQL) ORDER BY `blogDate` DESC";
            $result = $dbconnection->query($querySQL);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $blogID = $row['blogID'];
                    $author = $row['author'];
                    $blogDate = $row['blogDate'];
                    $blogTitle = $row['blogTitle'];
                    $blogContent = substr($row['blogContent'], 0, 100) . "...";
                    echo "<section id='post-$blogID' class='space-above-below'>
                            <h4 class='fw-light'>$blogTitle</h4>
                            <h6 class='fw-light'>Posted by $author on $blogDate</h6>
                            <p class='text-muted'>$blogContent</p>
                            <a href='post.php?postID=$blogID' role='button' class='btn btn-primary'>More details &raquo;</a>
                        </section>
                        <br>";
                }
            } 
            else {
                //If no blogs found from either username or fullname, display error message
                echo "<p>Sorry, no blog posts available. You have to follow people to see blog posts.</p>";
            }				
        }
        else {
            while ($row = $result->fetch_assoc()) {
                $blogID = $row['blogID'];
                $author = $row['author'];
                $blogDate = $row['blogDate'];
                $blogTitle = $row['blogTitle'];
                $blogContent = substr($row['blogContent'], 0, 100) . "...";
                echo "<section id='post-$blogID' class='space-above-below'>
                        <h4 class='fw-light'>$blogTitle</h4>
                        <h6 class='fw-light'>Posted by $author on $blogDate</h6>
                        <p class='text-muted'>$blogContent</p>
                        <a href='post.php?postID=$blogID' role='button' class='btn btn-primary'>More details &raquo;</a>
                    </section>
                    <br>";
            }
        }
    } else {
        // Title: Website homepage
        // Purpose: View Recent Tweeps of authors the user follows
        // Implementor: Aks Chunara (B00843788)
        // Features Implemented on page: User Story 4

        //Gets the authorIDs of the authors the user follows
        $querySQL = "SELECT followedID FROM `follow-table` WHERE `followerID` = {$_SESSION['userID']}";
        //Gets the blogs of the authors the user follows
        $querySQL = "SELECT * FROM `blog-posts` WHERE `authorID` in ($querySQL) ORDER BY `blogDate` DESC";
        $result = $dbconnection->query($querySQL);

        //Check if blogs are found
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $blogID = $row['blogID'];
                $author = $row['author'];
                $blogDate = $row['blogDate'];
                $blogTitle = $row['blogTitle'];
                $blogContent = substr($row['blogContent'], 0, 100) . "...";
                echo "<section id='post-$blogID' class='space-above-below'>
                        <h4 class='fw-light'>$blogTitle</h4>
                        <h6 class='fw-light'>Posted by $author on $blogDate</h6>
                        <p class='text-muted'>$blogContent</p>
                        <a href='post.php?postID=$blogID' role='button' class='btn btn-primary'>More details &raquo;</a>
                    </section>
                    <br>";
            }
        } else {//If no blogs found
            echo "<p>Sorry, no blog posts available. You have to follow people to see blog posts.</p>";
        }
    }
?>
