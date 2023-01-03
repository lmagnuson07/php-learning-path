<?php
/**
 * @var string $db
 */
require_once('../../../private/initialize.php');

$subjects = find_all_subjects_to_array();

$page_count = num_pages() + 1;

$page = [];
$page["position"] = $page_count;

if(is_post_request()) {

  // Handle form values sent by new.php

	$page['menu_name'] = $_POST['menu_name'] ?? '';
	$page['subject_id'] = $_POST['subject_id'] ?? '';
	$page['position'] = $_POST['position'] ?? '';
	$page['visible'] = $_POST['visible'] ?? '';
	$page['content'] = $_POST['content'] ?? '';

	$result = insert_page($page);
	$new_id = mysqli_insert_id($db);
	redirect_to(url_for('/staff/pages/show.php?id=' . $new_id));

}

?>

<?php $page_title = 'Create Page'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/pages/index.php'); ?>">&laquo; Back to List</a>

  <div class="page new">
    <h1>Create Page</h1>

    <form action="<?php echo url_for('/staff/pages/new.php'); ?>" method="post">
      <dl>
        <dt>Menu Name</dt>
        <dd><input type="text" name="menu_name" value="" /></dd>
      </dl>
			<dl>
				<dt>Subject</dt>
				<dd>
					<select name="subject_id">
						<?php
							foreach($subjects as $subject) {
								echo "<option value=\"{$subject['id']}\"";
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
          <input type="checkbox" name="visible" value="1" />
        </dd>
      </dl>
			<dl>
				<dt>Content</dt>
				<dd>
					<textarea name="content" value=""></textarea>
				</dd>
			</dl>
      <div id="operations">
        <input type="submit" value="Create Page" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
