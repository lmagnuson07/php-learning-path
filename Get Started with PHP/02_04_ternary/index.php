<?php
$is_logged_in = true;
$name = null;
//echo "Welcome" . ($is_logged_in ? " back!" : "!");

// Elvis operator. If name is null, use other value 'Joe'
//$name = $name ?: 'Joe';

//$name = $name ?? 'Joe';
// only works with inc. Determines if a variable is declared and is different than null.
$name = isset( $name ) ? $name : 'Joe';

echo $name;
