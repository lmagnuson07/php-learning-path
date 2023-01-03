<?php
$text = file_get_contents( 'treasure-island.txt' );
// file put contents wraps fopen, fwrite, and fclose into one.
// fopen, fwrite, and fclose can be used to avoid unnecessary, repeated opening and closing of the same file.
echo file_put_contents( 'ti-copy.txt', $text, FILE_APPEND );

$list = file('mailing-list.txt'); // reads mailing list text file.
$file_handle = fopen( 'sub-list.txt', 'a' );
foreach( $list as $entry ) {
    if ( strpos( $entry, 'casabona.org' ) ) {
        fwrite( $file_handle, $entry );
    }
}
fclose( $file_handle );