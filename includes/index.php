<?php
    session_start();

    //Access Control
	if(isset($_SESSION['username'])){
		header("Location: ../feed.php");
        die();
	} else {
        header("Location: ../index.php?noaccess=1");
        die();
    }
?>