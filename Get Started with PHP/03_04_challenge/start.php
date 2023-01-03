<?php
/**
 * Write equations that evaluate the following: 
 * (14 + 82 - 32 / 2)^2
 * 18 x (3 ÷ 6 -9) x 10
 * 5x (12 ÷2 -8 x 4 +12x6)
 * 
 * Be sure to use additional parentesis to get the right results! 
 */
// prints the same result as his solution without the extra (). Before 8.0, the () would have been necessary.
$newarray = array();

$newarray[] = $a = (14 + 82 - 32 / 2)**2;

$newarray[] = $b = 18 * (3 / 6 - 9) * 10;

$newarray[] = $c = 5 * (12 / 2 - 8 * 4 + 12 * 6);

$newarray = array($a, $b, $c);
echo '<pre>';
print_r($newarray);
echo '<pre/>';
