<?php

require_once('../../../private/initialize.php');

$menu_name = '';
$position = '';
$visible = '';

if(is_post_request()) {

	// Handle form values sent by new.php

	$menu_name = $_POST['menu_name'] ?? '';
	$position = $_POST['position'] ?? '';
	$visible = $_POST['visible'] ?? '';

	echo "Form parameters<br />";
	echo "Menu name: " . $menu_name . "<br />";
	echo "Position: " . $position . "<br />";
	echo "Visible: " . $visible . "<br />";
}
$test = $_GET['test'] ?? '';

if($test == '404') {
	error_404();
} elseif($test == '500') {
	error_500();
} elseif($test == 'redirect') {
	redirect_to(url_for('/staff/pages/index.php'));
}
?>

<?php $page_title = 'Create Page'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
	<a class="back-link" href="<?php echo url_for('/staff/pages/index.php'); ?>">&laquo; Back to List</a>

	<div class="subject new">
		<h1>Create Page</h1>

		<form action="<?php echo url_for('/staff/pages/new.php') ?>" method="post">
			<dl>
				<dt>Menu Name</dt>
				<dd><input type="text" name="menu_name" value="<?php echo $menu_name ?>"></dd>
			</dl>

			<dl>
				<dt>Position</dt>
				<dd>
					<select name="position">
						<option value="1" <?php echo $position === '1' ? 'selected' : '' ?>>1</option>
						<option value="2" <?php echo $position === '2' ? 'selected' : '' ?>>2</option>
					</select>
				</dd>
			</dl>

			<?php if($visible === '1'): ?>
			<dl>
				<dt>Visible</dt>
				<dd>
					<input type="hidden" name="visible" value="0">
					<input type="checkbox" name="visible" value="1" checked>
				</dd>
			</dl>
			<?php elseif($visible === '0'): ?>
				<dl>
					<dt>Visible</dt>
					<dd>
						<input type="hidden" name="visible" value="0">
						<input type="checkbox" name="visible" value="1">
					</dd>
				</dl>
			<?php elseif($visible === ''): ?>
			<dl>
				<dt>Visible</dt>
				<dd>
					<input type="hidden" name="visible" value="0">
					<input type="checkbox" name="visible" value="1">
				</dd>
			</dl>
			<?php endif; ?>

			<div id="operations">
				<input type="submit" value="Create Page">
			</div>
		</form>

	</div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
