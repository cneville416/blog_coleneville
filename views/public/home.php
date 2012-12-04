<?php

// Connect to the database
$conn = new mysqli('localhost',DB_USERNAME,DB_PASSWORD,DB_NAME);

// Construct the query (SQL)
$sql = "SELECT * FROM posts ORDER BY post_id DESC";
// Execute the query
$results = $conn->query($sql);

?>

<?php while($post = $results->fetch_assoc()): ?>
		<div id="post">
		<h4><a href="./?p=public/post&id=<?php echo $post_id?>"><?php echo $post['post_title'] ?></a></h4>
		<p><?php echo $post['post_text'] ?><p>
		<h6><?php echo $post['post_datepublished'] ?></h6>
		</div>
<?php endwhile; ?>