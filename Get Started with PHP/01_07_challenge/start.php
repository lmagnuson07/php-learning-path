<?php 
$name= "Teresa"; // Heading 1
$city = "NYC";
$movie = "Star Wars"; //Italics
$friend = "George"; //Bold
$candy = "Sour Patch Kids";
?>

<h1><?php echo $name;?>!</h1>

<p><?php echo $name;?> is from <?php echo $city;?>.</p>

<?php

// Need to add the \n to make it formatted properly in the page source. No need to do that when using the method above.
//echo "<h1>$name</h1>";
//echo '<h1>' . $name . "</h1>\n\n";
////echo '<p>' . $name . ' is from ' . $city . '.';
//echo "<p>$name is from $city.</p>\n\n";
//echo "<p>Her and her friend $friend went to watch $city the other day.</p>\n\n";
//echo "<p>The ate 15 bags of $candy and were super hyper after.</p>\n\n";
