<?php
/**
 * @var string $db
 */
require_once('../../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to(url_for('/staff/pages/index.php'));
}

$id = $_GET['id'];

if(is_post_request()) {

  // Handle form values sent by new.php

	$page['id'] = $id;
	$page['menu_name'] = $_POST['menu_name'] ?? '';
	$page['subject_id'] = $_POST['subject_id'] ?? '';
	$page['position'] = $_POST['position'] ?? '';
	$page['visible'] = $_POST['visible'] ?? '';
	$page['content'] = $_POST['content'] ?? '';

	$result = update_page($page);
	redirect_to(url_for('/staff/pages/show.php?id=' . $id));

} else {
	$page = find_page_by_id($id);
	$page_count = num_pages();

	$subjects = find_all_subjects_to_array();
}

?>

<?php $page_title = 'Edit Page'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/pages/index.php'); ?>">&laquo; Back to List</a>

  <div class="page edit">
    <h1>Edit Page</h1>

    <form action="<?php echo url_for('/staff/pages/edit.php?id=' . h(u($id))); ?>" method="post">
      <dl>
        <dt>Menu Name</dt>
        <dd><input type="text" name="menu_name" value="<?php echo h($page['menu_name']); ?>" /></dd>
      </dl>
			<dl>
				<dt>Subject</dt>
				<dd>
					<select name="subject_id" >
						<?php
							foreach($subjects as $subject) {
								echo "<option value=\"{$subject['id']}\"";
								if($subject['id'] == $page['subject_id']) {
									echo " selected";
								}
								echo ">{$subject['menu_name']}</option>";
							}
						?>
					</select>
				</dd>
			</dl>
      <dl>
        <dt>Position</dt>
        <dd>
          <select name="position">
						<?php
						for($i=1; $i <= $page_count; $i++) {
							echo "<option value=\"{$i}\"";
							if($page["position"] == $i) {
								echo " selected";
							}
							echo ">{$i}</option>";
						}
						?>
          </select>
        </dd>
      </dl>
      <dl>
        <dt>Visible</dt>
        <dd>
          <input type="hidden" name="visible" value="0" />
          <input type="checkbox" name="visible" value="1"<?php if($page['visible'] == "1") { echo " checked"; } ?> />
        </dd>
      </dl>
			<dl>
				<dt>Content</dt>
				<dd>
					<textarea name="content" value=""><?php echo trim(h($page['content'])); ?></textarea>
				</dd>
			</dl>
      <div id="operations">
        <input type="submit" value="Edit Page" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
