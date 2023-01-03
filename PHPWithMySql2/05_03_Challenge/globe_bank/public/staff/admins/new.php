<?php

require_once('../../../private/initialize.php');

if(is_post_request()) {
	// process the post
	$admin = [];
	$admin['first_name'] = $_POST['first_name'] ?? '';
	$admin['last_name'] = $_POST['last_name'] ?? '';
	$admin['email'] = $_POST['email'] ?? '';
	$admin['username'] = $_POST['username'] ?? '';
	$admin['password'] = $_POST['password'] ?? '';
	$admin['password_check'] = $_POST['password_check'] ?? '';

	$result = insert_admin($admin);
	if($result === true) {
		$new_id = mysqli_insert_id($db);
		$_SESSION['message'] = 'The admin was created successfully.';
		redirect_to(url_for('/staff/admins/show.php?id=' . $new_id));
	} else {
		$errors = $result;
	}

} else {

	// set up defaults
	$admin = [];
	$admin['first_name'] = '';
	$admin['last_name'] = '';
	$admin['email'] = '';
	$admin['username'] = '';
	$admin['password'] = '';
	$admin['password_check'] = '';

}
?>

<?php $page_title = 'Create Page'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

	<a class="back-link" href="<?php echo url_for('/staff/admins/index.php'); ?>">Back to List</a>

	<div class="admin new">
		<h1>Create Admin</h1>

		<?php echo display_errors($errors); ?>

		<form action="<?php echo url_for('/staff/admins/new.php'); ?>" method="post">
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
				<dt>Password</dt>
				<dd><input type="password" name="password" value="<?php echo h($admin['password']); ?>"></dd>
			</dl>
			<dl>
				<dt>Verify Password</dt>
				<dd><input type="password" name="password_check" value="<?php echo h($admin['password_check']); ?>"></dd>
			</dl>
			<div id="operations">
				<input type="submit" value="Create Admin" />
			</div>
		</form>

	</div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
