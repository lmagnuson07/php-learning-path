<?php

$a = 9 > 5;
$b = 10 != 10;
$c = $a && $b;
$d = $a || $b;
$e = $b && $c; 
$f = $a || $d;

$logic = array( $a, $b, $c, $d, $e, $f );

echo '<pre>';
print_r($logic);
var_dump( $logic ); 
echo '</pre>';

// && takes precedence over the assignment operator, but and does not
// C is getting assigned to a, so ($C = $a) and $b; is getting evaluated

// xor (^) will evaluated to true as long as one statement, but not all statements are true.
$c = $a and $b;

var_dump( $c );