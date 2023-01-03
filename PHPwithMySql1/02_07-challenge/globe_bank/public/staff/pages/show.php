<?php require_once('../../../private/initialize.php'); ?>

<?php
	$id = $_GET['id'] ?? '1';
	
	echo h($id);
?>
<a href="<?php echo url_for('/staff/pages/index.php'); ?>">Go back</a>
