<?php 
	//check to see if there is a message in out session data
if(isset($_SESSION['flash'])) {
	//display message
	echo '<p class="alert alert-'.$_SESSION['flash']['type'].'">';
	echo $_SESSION['flash']['message'];
	echo '</p>';
	//remove the message form session data
	unset($_SESSION['flash']);
}	
?>


