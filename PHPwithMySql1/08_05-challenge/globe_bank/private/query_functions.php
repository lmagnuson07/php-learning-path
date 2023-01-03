<?php

  // Subjects

  function find_all_subjects() {
    global $db;

    $sql = "SELECT * FROM subjects ";
    $sql .= "ORDER BY position ASC";
    //echo $sql;
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }

  function find_subject_by_id($id) {
    global $db;

    $sql = "SELECT * FROM subjects ";
    $sql .= "WHERE id='" . $id . "'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $subject = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $subject; // returns an assoc. array
  }

  function validate_subject($subject) {
    $errors = [];

    // menu_name
    if(is_blank($subject['menu_name'])) {
      $errors[] = "Name cannot be blank.";
    } elseif(!has_length($subject['menu_name'], ['min' => 2, 'max' => 255])) {
      $errors[] = "Name must be between 2 and 255 characters.";
    }

    // position
    // Make sure we are working with an integer
    $postion_int = (int) $subject['position'];
    if($postion_int <= 0) {
      $errors[] = "Position must be greater than zero.";
    }
    if($postion_int > 999) {
      $errors[] = "Position must be less than 999.";
    }

    // visible
    // Make sure we are working with a string
    $visible_str = (string) $subject['visible'];
    if(!has_inclusion_of($visible_str, ["0","1"])) {
      $errors[] = "Visible must be true or false.";
    }

    return $errors;
  }

  function insert_subject($subject) {
    global $db;

    $errors = validate_subject($subject);
    if(!empty($errors)) {
      return $errors;
    }

    $sql = "INSERT INTO subjects ";
    $sql .= "(menu_name, position, visible) ";
    $sql .= "VALUES (";
    $sql .= "'" . $subject['menu_name'] . "',";
    $sql .= "'" . $subject['position'] . "',";
    $sql .= "'" . $subject['visible'] . "'";
    $sql .= ")";
    $result = mysqli_query($db, $sql);
    // For INSERT statements, $result is true/false
    if($result) {
      return true;
    } else {
      // INSERT failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

  function update_subject($subject) {
    global $db;

    $errors = validate_subject($subject);
    if(!empty($errors)) {
      return $errors;
    }

    $sql = "UPDATE subjects SET ";
    $sql .= "menu_name='" . $subject['menu_name'] . "', ";
    $sql .= "position='" . $subject['position'] . "', ";
    $sql .= "visible='" . $subject['visible'] . "' ";
    $sql .= "WHERE id='" . $subject['id'] . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);
    // For UPDATE statements, $result is true/false
    if($result) {
      return true;
    } else {
      // UPDATE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }

  }

  function delete_subject($id) {
    global $db;

    $sql = "DELETE FROM subjects ";
    $sql .= "WHERE id='" . $id . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);

    // For DELETE statements, $result is true/false
    if($result) {
      return true;
    } else {
      // DELETE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

  // Pages

  function find_all_pages() {
    global $db;

    $sql = "SELECT * FROM pages ";
    $sql .= "ORDER BY subject_id ASC, position ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }

  function find_page_by_id($id) {
    global $db;

    $sql = "SELECT * FROM pages ";
    $sql .= "WHERE id='" . $id . "'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $page = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $page; // returns an assoc. array
  }

	function validate_page($page) {
		$errors = [];

		// subject id
		// Make sure we are working with an integer
		$subject_int = (int) $page['subject_id'];
		if($subject_int <= 0) {
			$errors['subject_id'] = "Subject ID must be greater than zero.";
		}
		if($subject_int > 999) {
			$errors['subject_id'] = "Subject ID must be less than 999.";
		}

		// menu name
		if(is_blank($page['menu_name'])) {
			$errors['menu_name'] = "Name cannot be blank.";
		} elseif(!has_length($page['menu_name'], ['min' => 2, 'max' => 255])) {
			$errors['menu_name'] = "Name must be between 2 and 255 characters.";
		}
		// unique menu name
		if(has_unique_page_menu_name($page['menu_name'])) {
			$errors['unique_name'] = "The menu name you entered already exists on the database.";
		}

		// position
		// Make sure we are working with an integer
		$postion_int = (int) $page['position'];
		if($postion_int <= 0) {
			$errors['position'] = "Position must be greater than zero.";
		}
		if($postion_int > 999) {
			$errors['position'] = "Position must be less than 999.";
		}

		// visible
		// Make sure we are working with a string
		$visible_str = (string) $page['visible'];
		if(!has_inclusion_of($visible_str, ["0","1"])) {
			$errors['visible'] = "Visible must be true or false.";
		}

		// content
		// make sure we are working with a string
		if(is_blank($page['content'])) {
			$errors['content'] = "Content cannot be blank.";
		}
		return $errors;
	}

	function individual_validation($err_msg) {
		// Could wrap in a span with a class and style.
		echo $err_msg;
	}

	function has_unique_page_menu_name($menu_name) {
		global $db;

		$sql = "SELECT * FROM pages ";
		$sql .= "WHERE menu_name='" . $menu_name . "'";
		$result = mysqli_query($db, $sql);
		$name = mysqli_fetch_assoc($result);
		mysqli_free_result($result);

		if ($name) {
			return true;
		} else {
			return false;
		}
	}

  function insert_page($page) {
    global $db;

		$errors = validate_page($page);
		if(!empty($errors)) {
			return $errors;
		}

    $sql = "INSERT INTO pages ";
    $sql .= "(subject_id, menu_name, position, visible, content) ";
    $sql .= "VALUES (";
    $sql .= "'" . $page['subject_id'] . "',";
    $sql .= "'" . $page['menu_name'] . "',";
    $sql .= "'" . $page['position'] . "',";
    $sql .= "'" . $page['visible'] . "',";
    $sql .= "'" . $page['content'] . "'";
    $sql .= ")";
    $result = mysqli_query($db, $sql);
    // For INSERT statements, $result is true/false
    if($result) {
      return true;
    } else {
      // INSERT failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

  function update_page($page) {
    global $db;

		$errors = validate_page($page);
		if(!empty($errors)) {
			return $errors;
		}

    $sql = "UPDATE pages SET ";
    $sql .= "subject_id='" . $page['subject_id'] . "', ";
    $sql .= "menu_name='" . $page['menu_name'] . "', ";
    $sql .= "position='" . $page['position'] . "', ";
    $sql .= "visible='" . $page['visible'] . "', ";
    $sql .= "content='" . $page['content'] . "' ";
    $sql .= "WHERE id='" . $page['id'] . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);
    // For UPDATE statements, $result is true/false
    if($result) {
      return true;
    } else {
      // UPDATE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }

  }

	function validate_page_id($id) {
		global $db;
		$errors = [];

		// Ensure the id is greater than 0
		if($id <= 0) {
			$errors[] = "The id must be greater than 0.";
		}
		// check if the id exists on the database before deleting it
		$sql = "SELECT * FROM pages ";
		$sql .= "WHERE id='" . $id . "'";
		$result = mysqli_query($db, $sql);
		$temp = mysqli_fetch_assoc($result);
		mysqli_free_result($result);
		if(!isset($temp)) {
			$errors[] = "The id to delete no longer exists on the database";
		}
		return $errors;
	}

  function delete_page($id) {
    global $db;

		$errors = validate_page_id($id);
		if(!empty($errors)) {
			return $errors;
		}

    $sql = "DELETE FROM pages ";
    $sql .= "WHERE id='" . $id . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);

    // For DELETE statements, $result is true/false
    if($result) {
      return true;
    } else {
      // DELETE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

?>
