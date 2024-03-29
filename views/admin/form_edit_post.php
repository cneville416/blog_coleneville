<?php

// Connect to the database
$conn = new mysqli('localhost',DB_USERNAME,DB_PASSWORD,DB_NAME);

// Construct query
$sql = "SELECT * FROM posts WHERE post_id={$_GET['id']} LIMIT 1";

// Execute query
$results = $conn->query($sql);

// Get the band
$post = $results->fetch_assoc();

// Close the connection
$conn->close();

?>
<h2 class="new">Edit Post</h2>
<form action="actions/edit_post.php" method="post" class="form-horizontal">
	<input type="hidden" name="post_id" value="<?php echo $post['post_id'] ?>" />
	<input type="hidden" name="post_datepublished" value="<?php echo $post['post_datepublished']?>"/>
	<div class="control-group">
		<label class="control-label" for="post_title">Post Title</label>
		<div class="controls">
			<input class="span6" type="text" name="post_title" placeholder="required" value="<?php echo $post['post_title'] ?>"/>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="post_text">Entry</label>
		<div class="controls">
<textarea rows="22" cols="30" class="span7" name="post_text">
<?php echo $post['post_text']?>
</textarea>
		</div>
	</div>
	<div class="form-actions">
		<button type="submit" class="btn btn-primary">Edit</button>
		<button type="button" class="btn" onclick="window.history.go(-1)">Cancel</button>
	</div>
</form>
