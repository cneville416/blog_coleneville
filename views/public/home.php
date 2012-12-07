<?php
// Connect to the database
$conn = new mysqli('localhost',DB_USERNAME,DB_PASSWORD,DB_NAME);
// Construct the query (SQL)
$sql = "SELECT * FROM posts ORDER BY post_id DESC";
// Execute the query
$results = $conn->query($sql);

?>

<?php $post = $results->fetch_assoc(); ?>
	<div class="post23">
		<h3 class="title3"><a href="./?p=public/post&id=<?php echo $post['post_id']?>"><?php echo $post['post_title'] ?></a></h3>
		<h6 id="time"><?php echo date('D, M d, Y g:i a',strtotime($post['post_datepublished'])) ?></h6>
		<p class="content"><?php echo $post['post_text'] ?><p>
	</div>
<?php while($post = $results->fetch_assoc()): ?>
	<div class="post24 post23">
		<h4 class="title3"><a href="./?p=public/post&id=<?php echo $post['post_id']?>"><?php echo $post['post_title'] ?></a></h4>
		<h6 id="time"><?php echo date('D, M d, Y g:i a',strtotime($post['post_datepublished'])) ?></h6>
	</div>
<?php endwhile; ?>