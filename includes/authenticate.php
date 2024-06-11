<?php
    //Start Sessions
    session_start();
    require_once("../db/db.php");
    
    //Checks whether user want to sign up or log in
    // echo "{$_SESSION['token']}  {$_POST['token']}";
    if (isset($_POST['login']) && $_SESSION['token'] == $_POST['token']) {
        $username = trim(stripslashes(htmlspecialchars($_POST['username'])));
        $password = trim(stripslashes(htmlspecialchars($_POST['password'])));

        //Logs in the user
        $querySQL = "SELECT * FROM `user-credentials` WHERE `username` = '$username';";
        $result = $dbconnection->query($querySQL);
        if ($result->num_rows == 1) {
            $result = $result->fetch_assoc();
            if(password_verify($password, $result['password'])) {
                session_regenerate_id(true);
                $_SESSION['userID']   = $result['userID'];
                $_SESSION['password'] = $password;
                $_SESSION['username'] = $result['username'];
                $_SESSION['fullname'] = $result['firstName'] . " " . $result['lastName'];
                $_SESSION['access'] = $result['securityAccess'];
                header("Location: ../feed.php");
                die();
            } else {
                //Redirects with error message 
                header("Location: ../index.php?loginerror=1");
                die();
            }
        } else {
            //Redirects with error message 
            header("Location: ../index.php?loginerror=1");
            die();
        }  
    } else {
        if(!isset($_POST['login'])){
            //Redirects with error message 
            header("Location: ../feed.php?noaccess=1");
            die();
        } else {
            //Redirects with error message 
            header("Location: ../index.php?loginerror=1");
            die();
        }
    }
?>
