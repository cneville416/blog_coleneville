<?php
// Connect to the database
$conn = new mysqli('localhost',DB_USERNAME,DB_PASSWORD,DB_NAME);

// Construct the query (SQL)
extract($_POST);
$sql =  "SELECT * FROM bands WHERE";
// Execute the query
$results = $conn->query($sql);

echo $post_title;
