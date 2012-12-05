<?php
session_start();
// Load DB constants
require('../config/dbconfig.php');

// Connect to the database
$conn = new mysqli('localhost',DB_USERNAME,DB_PASSWORD,DB_NAME);
extract($_POST);
// Construct query with POSTed data
$post_text = addslashes($post_text);
$post_title = addslashes($post_title);

$sql = "UPDATE posts SET post_title = '$post_title', post_text = '$post_text' WHERE post_id= $post_id";

// Execute query
$conn->query($sql);

// Echo error
if($conn->error != '') {
	echo '<h2>MySQLError</h2><p>'.$conn->error.'</p>';
	echo "<h3>SQL Executed</h3><p>$sql</p>";
	echo '<pre>$_POST: ';
	print_r($_POST);
	echo '</pre>';
} else {
	$_SESSION['flash'] = array(
			'message' =>"<strong>$post_title</strong> was successfully edited",
			'type' => ""
	);
	
	// Redirect
	header('Location:../?p=public/home');
}

// Close DB connection
$conn->close();