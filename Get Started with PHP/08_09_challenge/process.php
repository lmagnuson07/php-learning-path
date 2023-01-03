<?php
$message = '';
foreach($_POST as $name => $value) {
	if ('submit' != $name) {
		$message .= ucfirst($name) . " is $value.\n\n";
	}
}

$to = "Logan Magnuson<logan@gmail.com>";
$subject = "Reason for Contact: " . $_POST['reason'];
$from = $_POST['name'] . '<' . $_POST['email'] . '>';

$headers = 'From: ' . $from . "\r\n" .
	'Reply-To: ' . $from . "\r\n" .
	'X-Mailer: PHP/' . phpversion();
	
if (mail($to, $subject, $message, $headers)) {
	echo "<h3>Your message has been sent!</h3>";
}