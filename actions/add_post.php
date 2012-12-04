<?php
session_start();

extract($_POST);

//check to see if all info was provided
if($post_title == '' || $post_text == '' ) {
	//message to be displayed on next request
	$_SESSION['flash'] = array(
			'message' =>"Please provide all required information",
			'type' => "danger"
	);
	//store the entered info into session data
	$_SESSION['post_title'] = $post_title ;
	$_SESSION['post_text'] = $post_text ;
	
	//redirect back to the form
	header('Location:../?p=admin/form_add_post');
	
	//stop executing current request and send whatever is in the output buffer to the browser
	die(); 
}else {
	require('../config/dbconfig.php');
	$conn = new mysqli('localhost',DB_USERNAME,DB_PASSWORD,DB_NAME);
	$sql = "INSERT INTO posts (post_title,post_text) VALUES('$post_title','$post_text')";
	$conn->query($sql);
	
	if($conn->error != '') {
		echo '<h2>MySQLError</h2><p>'.$conn->error.'</p>';
		echo "<h3>SQL Executed</h3><p>$sql</p>";
		echo '<pre>$_POST: ';
		print_r($_POST);
		echo '</pre>';
	} else {
	
		$_SESSION['flash'] = array(
				'message' =>"<strong>$post_title</strong> was successfully added",
				'type' => "success"
		);
		// Redirect
		header('Location:../?p=admin/list_posts');
	
	
	}
	}
	$conn->close();