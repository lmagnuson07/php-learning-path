<?php
/** 
 * Challenge: Print every number in the Fiobnacci Sequence without going over 200. 
 */

 $current = 1;
 $previous = 0;
 $next = null;
 $limit = 200;
 $sequence = '';

 while( $current < $limit ) {
     $sequence .= $current . ', ';
     $next = $current + $previous;
     $previous = $current;
     $current = $next;
 }

 // strlen is the length of the string.
 $sequence = trim( $sequence );
 $sequence = substr( $sequence, 0, strlen( $sequence)-1 );

 echo $sequence;
