<?php  
// Connect to the database
$conn = new mysqli('localhost',DB_USERNAME,DB_PASSWORD,DB_NAME);
// Construct the query (SQL)
extract($_GET);
$sql =  "SELECT * FROM posts WHERE post_id=$id";
// Execute the query
$results = $conn->query($sql);

?>

<?php while($post = $results->fetch_assoc()): ?>
	<div class="posted">
	<h1 id="title"><?php echo $post['post_title']?></h1>
	<p class="post"><?php  echo $post['post_text']?></p>
	<h6 id="post_time"><?php echo $post['post_datepublished']?></h6>
	</div>
<?php endwhile;?>