<?php

require_once('../../../private/initialize.php');

if(!isset($_GET['id'])) {
	$_SESSION['message'] = 'No admin id was passed to the page.';
	redirect_to(url_for('/staff/admins/index.php'));
}
$id = $_GET['id'];

if(is_post_request()) {
	$admin = [];
	$admin['id'] = $id;
	$admin['first_name'] = $_POST['first_name'] ?? '';
	$admin['last_name'] = $_POST['last_name'] ?? '';
	$admin['email'] = $_POST['email'] ?? '';
	$admin['username'] = $_POST['username'] ?? '';
	$admin['password'] = $_POST['password'] ?? '';
	$admin['password_check'] = $_POST['password_check'] ?? '';

	$result = update_admin($admin);
	if($result === true) {
		$_SESSION['message'] = "The Admin was updated successfully.";
		redirect_to(url_for('/staff/admins/show.php?id=' . $id));
	} else {
		$errors = $result;
	}
} else {
	$admin = find_admin_by_id($id);
}

?>

<?php $page_title = 'Edit Admin'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

	<a class="back-link" href="<?php echo url_for('/staff/admins/index.php'); ?>">Back to List</a>

	<div class="admin new">
		<h1>Edit Admin</h1>

		<?php echo display_errors($errors); ?>

		<form action="<?php echo url_for('/staff/admins/edit.php?id=' . h(u($id))); ?>" method="post">
			<dl>
				<dt>First Name</dt>
				<dd><input type="text" name="first_name" value="<?php echo h($admin['first_name']); ?>"></dd>
			</dl>
			<dl>
				<dt>Last Name</dt>
				<dd><input type="text" name="last_name" value="<?php echo h($admin['last_name']); ?>"></dd>
			</dl>
			<dl>
				<dt>Email</dt>
				<dd><input type="email" name="email" value="<?php echo h($admin['email']); ?>"></dd>
			</dl>
			<dl>
				<dt>Username</dt>
				<dd><input type="text" name="username" value="<?php echo h($admin['username']); ?>"></dd>
			</dl>
			<dl>
				<dt>New Password</dt>
				<dd><input type="password" name="password" value="" placeholder="Enter new password..."></dd>
			</dl>
			<dl>
				<dt>Verify Password</dt>
				<dd><input type="password" name="password_check" value="" placeholder="Verify new password..."></dd>
			</dl>
			<div id="operations">
				<input type="submit" value="Edit Admin" />
			</div>
		</form>

	</div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
