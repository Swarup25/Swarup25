<?php

session_start();
if (isset($_GET["token"])) {
    $conn = mysqli_connect("localhost", "root", "", "mydb");
    if ($conn === false) {
        die("ERROR: Could not Connect! " . mysqli_connect_error());
    }
    $my_email="nathswarup63@gmail.com";
    $base_url="http://localhost/LoginorSignup_Page/index.php";
    $sql = "UPDATE logindb SET status='1' WHERE token='{$_GET["token"]}'";
    mysqli_query($conn, $sql);
    
    $showUserId = mysqli_fetch_assoc(mysqli_query($conn, "SELECT id FROM logindb WHERE token='{$_GET["token"]}'"));
    $_SESSION["user_id"] = $showUserId['id'];
    header("Location: profile_page.php");
} 
else {
    header("Location: index.php");
}

?>