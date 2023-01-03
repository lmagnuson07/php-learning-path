<?php
$min = 1; 
$max = 5;
$guess = 3; //Change this value to test!
//$num = 16; // Change this value to test!

// If you really want to go nuts, try this:
echo "<h1>Number guessing game</h1>\n\n";
$num = rand($min, $max);
if ($guess > $max || $guess < $min) {
    echo "<p>Your guess of $guess is out of range. Your guess must be between $min and $max inclusive.</p>\n\n";
    // will stop the program from running at this spot.
    // exit();
} else {
    if ($guess == $num) {
        echo "<p>The number was $num! Congradulations!</p>\n\n";
    } else if ($guess > $num) {
        echo "<p>The number was $num! Sorry, you were to high!</p>\n\n";
    } else if ($guess < $num) {
        echo "<p>The number was $num! Sorry, you were to low!</p>\n\n";
    } else {
        echo "<p>Sorry, something went wrong!</p>\n\n";
    }
}
