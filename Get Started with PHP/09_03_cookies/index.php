<?php
setcookie( 'visited', true );

// destroys the cookie by setting it to a time in the past.
// You must destroy/create a cookie before printing anything on the screen.
if( isset( $_COOKIE['visited'] ) ) :
    setcookie( 'visited', false, time() - 3600 );
?>
<h1>Welcome back!</h1>
<?php else: ?>
<h1>Welcome!</h1>
<?php endif; ?>