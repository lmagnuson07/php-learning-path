<?php

// This guide demonstrates the five fundamental steps
// of database interaction using PHP.

// Credentials
$dbhost = 'localhost';
$dbuser = 'webuser';
$dbpass = 'secretpassword';
$dbname = 'globe_bank';

// 1. Create a database connection
//$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
$connection = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

// Test if connection succeeded
//if(mysqli_connect_errno()) {
//  $msg = "Database connection failed: ";
//  $msg .= mysqli_connect_error();
//  $msg .= " (" . mysqli_connect_errno() . ")";
//  exit($msg);
//}
if($connection->connect_errno) {
  $msg = "Database connection failed: ";
  $msg .= $connection->connect_error;
  $msg .= " (" . $connection->connect_errno . ")";
  exit($msg);
}

// 2. Perform database query
//$query = "SELECT * FROM subjects";
//$result_set = mysqli_query($connection, $query);
$sql = "SELECT * FROM bicycles";
$result_set = $connection->query($sql);

// Test if query succeeded
if (!$result_set) {
	exit("Database query failed.");
}

// 3. Use returned data (if any)
//while($subject = mysqli_fetch_assoc($result_set)) {
//  echo $subject["menu_name"] . "<br />";
//}
while($record = $result_set->fetch_assoc()) {
    $object_array[] = self::instantiate($record);
}

// 4. Release returned data
//mysqli_free_result($result_set);
$result_set->free();

// 5. Close database connection
//mysqli_close($connection);
$connection->close();

?>
