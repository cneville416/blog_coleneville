<?php

// Connect to the database
$conn = new mysqli('localhost',DB_USERNAME,DB_PASSWORD,DB_NAME);

// Construct the query (SQL)
$sql = "SELECT * FROM posts ORDER BY post_id DESC";

// Execute the query
$results = $conn->query($sql);

?>
<div id="tabl"><table class="table table-striped table-condensed table-bordered tables table1">
	<tr>
		<th>Post Title</th>
		<th>Entry</th>
		<th>Time Posted</th>
		<th></th>
	</tr>
<?php while($post = $results->fetch_assoc()): ?>
	<tr>
		<td><a href="./?p=public/post&id=<?php echo $post['post_id']?>" class="admin"><?php echo $post['post_title'] ?></a></td>
		<td><?php echo $post['post_datepublished'] ?></td>
		<td class="actions">
			<a class="btn btn-warning btn-mini" title="EDIT" href="./?p=admin/form_edit_post&id=<?php echo $post['post_id']?>"><i class="icon-edit icon-white"></i></a>
			<a class="btn btn-danger btn-mini" title="DELETE" href="./actions/delete_post.php?id=<?php echo $post['post_id']?>"><i class="icon-trash icon-white"></i></a>
		</td>
	</tr>
<?php endwhile; ?>
</table></div>
<a class="btn btn-primary add" href="./?p=admin/form_add_post"><i class="icon-plus icon-white"></i> Add Post</a>