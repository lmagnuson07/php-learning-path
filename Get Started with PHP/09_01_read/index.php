<?php

//$lines = file( 'treasure-island.txt'); // prints out an array
readfile('treasure-island.txt'); // preserves formatting
//var_dump( $lines );
//echo file_get_contents('treasure-island.txt');

//$casabona = file_get_contents( 'https://casabona.org' );
//var_dump($casabona);
//
if( strpos( $casabona, 'wp-content' ) ) {
    echo "<p>This website is  using WordPress!</p>";
}