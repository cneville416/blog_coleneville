<?php 
// check for band info in session data
$post_title = '';
$post_text = '';
extract($_SESSION);

//remove band info form session data
unset($_SESSION['post_title']);
unset($_SESSION['post_text']);
?>
<h2>Add a new post</h2>
<form action="actions/add_post.php" method="post" class="form-horizontal">
	<div class="control-group">
		<label class="control-label" for="post_title">Post Title</label>
		<div class="controls">
			<input class="span4" type="text" name="post_title" placeholder="required" value="<?php echo $post_title?>"/>
		</div>
	</div>
	
	<div class="control-group">
		<label class="control-label" for="post_text">text</label>
		<div class="controls">
			<input class="span4" type="text" name="post_text" placeholder="required"  value="<?php echo $post_text?>"/>
		</div>
	</div>
	<div class="form-actions">
		<button type="submit" class="btn btn-success">Add</button>
		<button type="button" class="btn" onclick="window.history.go(-1)">Cancel</button>
	</div>
</form>