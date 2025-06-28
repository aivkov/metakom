<?php
function printr($array) {
    echo '<pre style="position: relative; z-index: 800; background: #fbfbfb; color: black;max-height: 350px; overflow: auto; border: 1px solid #111; ">';
    print_r( $array );
    echo '</pre>';
}

function write($data, $param = 'a+')
{
    $f = fopen( $_SERVER['DOCUMENT_ROOT'] . '/logs/log.txt', $param );
    flock( $f, LOCK_EX );
    fwrite( $f, print_r( $data, true ) );
    flock( $f, LOCK_UN );
    fclose( $f );
}