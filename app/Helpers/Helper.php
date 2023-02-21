<?php

/* 
    ! return type string
    ? parameter is a number
 */
function unique_str($length = 5):string
{
    if (!is_int($length)) {
        return false;
    }
    $str = bin2hex(random_bytes($length)); 
    return $str;
}
